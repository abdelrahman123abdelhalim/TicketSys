<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataGrids\TicketsIndexDataGrid;
use App\Models\Ticket;
use App\Models\Attachment;
use App\Http\Requests\TicketRequest;
use Str;
use Carbon\Carbon;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    private static $ticketCode = 0;

    public function index()
    {
        $records = Ticket::paginate(6);
        return view('admin.tickets.index', ['records' => $records]);
    }

    public function filter(Request $request)
    {
        $code = $request->input('code');
        $status = $request->input('status');
        $type = $request->input('type');
        $companyName = $request->input('customer_name');
        $userName = $request->input('user_name');
        $sendTo = $request->input('directed_to');
        $createdAt = $request->input('created_at');
        $updatedAt = $request->input('updated_at');
        $filteredData = Ticket::query()
            ->when($code, function ($query) use ($code) {
                return $query->where('ticket_code', $code);
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($type, function ($query) use ($type) {
                return $query->where('type', $type);
            })
            ->when($companyName, function ($query) use ($companyName) {
                return $query->where('customer_name', 'like', '%' . $companyName . '%');
            })
            ->when($userName, function ($query) use ($userName) {
                return $query->where('user_name', 'like', '%' . $userName . '%');
            })
            ->when($sendTo, function ($query) use ($sendTo) {
                return $query->where('directed_to', 'like', '%' . $sendTo . '%');
            })
            ->when($createdAt, function ($query) use ($createdAt) {
                return $query->where('created_at', 'like', '%' . $createdAt . '%');
            })
            ->when($updatedAt, function ($query) use ($updatedAt) {
                return $query->where('updated_at', 'like', '%' . $updatedAt . '%');
            })
            ->get();

        return response()->json(view('admin.tickets.filtered_Data', compact('filteredData'))->render());
    }

    public function add()
    {
        return view('admin.tickets.create');
    }

    public function store(TicketRequest $request)
    {
        $lastTicket = Ticket::latest('ticket_code')->first();
        $lastTicketCode = $lastTicket ? $lastTicket->ticket_code : 0;
        $userCode = mt_rand(100, 999);

        $ticket = new Ticket([
            'ticket_code' => $lastTicketCode + 1,
            'user_name' => $request->input('user_name'),
            'user_code' => $userCode,
            'status' => 1,
            'type' => $request->input('type'),
            'importance_level' => $request->input('importance_level'),
            'customer_name' => $request->input('customer_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'directed_to' => $request->input('directed_to'),
            'complaint_subject' => $request->input('complaint_subject'),
            'complaint_description' => $request->input('complaint_description'),
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ]);

        $ticket->save();

        $attachments = $this->processAttachments($request, $ticket->id);

        return redirect()->route('admin.tickets.index')->with([
            'success' => 'تم إضافة التذكرة بنجاح',
        ]);
    }

    public function view($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return redirect()->route('admin.tickets.index')->with([
                'error' => 'لاتوجد تذكرة !',
            ]);
        }

        return view('admin.tickets.view', ['ticket' => $ticket]);
    }

    public function edit($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return redirect()->route('admin.tickets.index')->with([
                'error' => 'لاتوجد تذكرة !',
            ]);
        }

        return view('admin.tickets.edit', ['ticket' => $ticket]);
    }

    public function update(UpdateTicketRequest $request, $id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return redirect()->route('admin.tickets.index')->with([
                'error' => 'لاتوجد تذكرة !',
            ]);
        }

        $ticket->update([
            'user_name' => $request->user_name,
            'status' => $request->status,
            'type' => $request->type,
            'importance_level' => $request->importance_level,
            'customer_name' => $request->customer_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'directed_to' => $request->directed_to,
            'complaint_subject' => $request->complaint_subject,
            'complaint_description' => $request->complaint_description,
            'updated_at' => Carbon::now()
        ]);

        $attachments = $this->processAttachments($request, $ticket->id);

        return redirect()->route('admin.tickets.index')->with([
            'success' => 'تم تعديل بيانات التذكرة بنجاح',
        ]);
    }

    private function processAttachments(Request $request, $ticketId)
    {
        $attachments = [];

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $attachmentPath = $attachment->store('attachments', 'attachments');
                $attachments[] = $this->storeAttachment($attachmentPath, $ticketId);
            }
        }

        return $attachments;
    }

    private function storeAttachment($attachmentPath, $ticketId)
    {
        return Attachment::create([
            'ticket_id' => $ticketId,
            'path' => $attachmentPath,
        ]);
    }
}