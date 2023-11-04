<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataGrids\TicketsIndexDataGrid;
use App\Models\Ticket;

class TicketController extends Controller
{

    protected $_config;

    public function __construct() {
        $this->_config = request('_config');

    }

    public function index()
    {
      $records =  Ticket::paginate(3); 
      return view ('admin.tickets.index',['records'=>$records]);
    }

}