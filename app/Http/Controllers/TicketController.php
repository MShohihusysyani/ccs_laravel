<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AjaxTicket;
use App\Models\Ticket;
use App\Models\Klien;
use App\Models\User;

class TicketController extends Controller
{
    public function allticket()
    {
        $data = [
            'title' => 'All Ticket'
        ];
        return view('ticket.allticket', $data);
    }

    public function allticketajax(Request $request)
    {
        $data = AjaxTicket::getDatatables($request);
        $total = AjaxTicket::countAll();
        $filtered = AjaxTicket::countFiltered($request);

        // format data seperti di CI
        $formattedData = [];
        $no = $request->input('start', 0);

        foreach ($data as $pelaporan) {
            $no++;
            $row = [];

            $row[] = $no;
            $row[] = $pelaporan->no_tiket;
            $row[] = tanggal_indo($pelaporan->created_at);
            $row[] = $pelaporan->nama;
            $row[] = $pelaporan->judul;
            $row[] = $pelaporan->kategori;
            $row[] = $this->priority($pelaporan->priority);
            $row[] = $this->maxday($pelaporan->maxday);
            $row[] = $this->status($pelaporan->status);

            // Handle by combined
            $handles = array_filter([$pelaporan->handle_by, $pelaporan->handle_by2, $pelaporan->handle_by3]);
            $row[] = implode(', ', $handles);

            $row[] = $pelaporan->tags;

            $formattedData[] = $row;
        }

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $formattedData,
        ]);
    }

    // ADDED
    public function added()
    {
        $added = Ticket::with('klien')->where('status', 'ADDED')->orderBy('created_at', 'desc')->get();

        $data = [
            'title' => 'Added Ticket',
            'added' => $added
        ];

        return view('ticket.added', $data);
    }

    // ADDED 2
    public function added2()
    {
        $added = Ticket::with('klien')->where('status', 'ADDED 2')->orderBy('created_at', 'desc')->get();

        $data = [
            'title' => 'Added Ticket',
            'added' => $added
        ];

        return view('ticket.added2', $data);
    }


    // HANDLED
    // public function handled()
    // {
    //     $handled = Ticket::with('klien')->whereIn('status', ['HANDLED', 'HANDLED 2'])->orderBy('created_at', 'desc')->get();

    //     $data = [
    //         'title' => 'Handled Ticket',
    //         'handled' => $handled
    //     ];

    //     return view('ticket.handled', $data);
    // }

    public function handled()
    {
        $data = [
            'title'   => 'Handled Ticket',
            'kliens'  => Klien::getData(),
            'handled' => User::getDataPetugas()
        ];

        return view('ticket.handled', $data);
    }

    public function ajax_handled(Request $request)
    {
        // Ambil filter kustom dari request
        $filters = $request->only([
            'tanggal_awal',
            'tanggal_akhir',
            'nama_klien',
            'nama_user',
        ]);

        $data = AjaxTicket::getDatatablesHandled($request, $filters);
        $total = AjaxTicket::countAllHandled();
        $filtered = AjaxTicket::countFilteredHandled($request, $filters);
        // format data seperti di CI
        $formatted_data = [];
        $no = $request->input('start', 0);

        foreach ($data as $pelaporan) {
            $no++;
            $row = [];

            $row[] = $no;
            $row[] = $pelaporan->no_tiket;
            $row[] = tanggal_indo($pelaporan->created_at);
            $row[] = $pelaporan->nama_klien;
            $row[] = $pelaporan->judul;
            $row[] = $pelaporan->kategori;
            $row[] = $this->priority($pelaporan->priority);
            $row[] = $this->maxday($pelaporan->maxday);
            $row[] = $this->status($pelaporan->status);

            // Handle by combined
            $handles = array_filter([$pelaporan->handle_by, $pelaporan->handle_by2, $pelaporan->handle_by3]);
            $row[] = implode(', ', $handles);

            $row[] = $pelaporan->tags;

            $formatted_data[] = $row;
        }
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $formatted_data,
        ]);
    }

    // HANDLED 2
    public function handled2()
    {
        $data = [
            'title'    => 'Handled Ticket',
            'kliens'   => Klien::getData(),
            'petugas'  => User::getDataPetugas(),
            'handled2' => User::getDataImplementator()
        ];

        return view('ticket.handled2', $data);
    }

    public function ajax_handled2(Request $request)
    {
        // Ambil filter kustom dari request
        $filters = $request->only([
            'tanggal_awal',
            'tanggal_akhir',
            'nama_klien',
            'nama_user',
        ]);

        $data = AjaxTicket::getDatatablesHandled2($request, $filters);
        $total = AjaxTicket::countAllHandled2();
        $filtered = AjaxTicket::countFilteredHandled2($request, $filters);
        // format data seperti di CI
        $formatted_data = [];
        $no = $request->input('start', 0);

        foreach ($data as $pelaporan) {
            $no++;
            $row = [];

            $row[] = $no;
            $row[] = $pelaporan->no_tiket;
            $row[] = tanggal_indo($pelaporan->created_at);
            $row[] = $pelaporan->nama_klien;
            $row[] = $pelaporan->judul;
            $row[] = $pelaporan->kategori;
            $row[] = $this->priority($pelaporan->priority);
            $row[] = $this->maxday($pelaporan->maxday);
            $row[] = $this->status($pelaporan->status);

            // Handle by combined
            $handles = array_filter([$pelaporan->handle_by, $pelaporan->handle_by2, $pelaporan->handle_by3]);
            $row[] = implode(', ', $handles);

            $row[] = $pelaporan->tags;

            $formatted_data[] = $row;
        }
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $formatted_data,
        ]);
    }

    // CLOSED
    public function closed()
    {
        $closed = Ticket::with('klien')->where('status', 'CLOSED')->orderBy('created_at', 'desc')->get();

        $data = [
            'title'  => 'Closed Ticket',
            'closed' => $closed
        ];

        return view('ticket.closed', $data);
    }

    // FINISHED
    public function finished()
    {
        $data = [
            'title'   => 'Finished Ticket',
            'kliens'  => Klien::getData(),
            'petugas' => User::getDataPetugas()

        ];
        return view('ticket.finished', $data);
    }

    public function ajax_finished(Request $request)
    {
        // Ambil filter kustom dari request
        $filters = $request->only([
            'tanggal_awal',
            'tanggal_akhir',
            'nama_klien',
            'nama_user',
            'rating'
        ]);

        $data = AjaxTicket::getDatatablesFinished($request, $filters);
        $total = AjaxTicket::countAllFinished();
        $filtered = AjaxTicket::countFilteredFinished($request, $filters);
        // format data seperti di CI
        $formatted_data = [];
        $no = $request->input('start', 0);

        foreach ($data as $pelaporan) {
            $no++;
            $row = [];

            $row[] = $no;
            $row[] = $pelaporan->no_tiket;
            $row[] = tanggal_indo($pelaporan->created_at);
            $row[] = $pelaporan->nama_klien;
            $row[] = $pelaporan->judul;
            $row[] = $pelaporan->kategori;
            $row[] = $this->priority($pelaporan->priority);
            $row[] = $this->maxday($pelaporan->maxday);
            $row[] = $this->status($pelaporan->status);

            // Handle by combined
            $handles = array_filter([$pelaporan->handle_by, $pelaporan->handle_by2, $pelaporan->handle_by3]);
            $row[] = implode(', ', $handles);

            $row[] = $this->rating($pelaporan->rating);

            // $row[] = $pelaporan->tags;

            $formatted_data[] = $row;
        }
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $formatted_data,
        ]);
    }


    // LABLE
    private function priority($priority)
    {
        return match ($priority) {
            'Low' => '<span class="badge rounded-pill badge-info">Low</span>',
            'Medium' => '<span class="badge rounded-pill badge-warning">Medium</span>',
            'High' => '<span class="badge rounded-pill badge-danger">High</span>',
            default => $priority,
        };
    }

    private function maxday($maxday)
    {
        return match ((int)$maxday) {
            90 => '<span class="badge rounded-pill badge-info">90</span>',
            60 => '<span class="badge rounded-pill badge-warning">60</span>',
            7  => '<span class="badge rounded-pill badge-danger">7</span>',
            default => $maxday,
        };
    }

    private function status($status)
    {
        return match ($status) {
            'ADDED', 'ADDED 2' => '<span class="badge rounded-pill badge-primary">' . $status . '</span>',
            'HANDLED', 'HANDLED 2' => '<span class="badge rounded-pill badge-info">' . $status . '</span>',
            'CLOSED' => '<span class="badge rounded-pill badge-danger">' . $status . '</span>',
            'FINISHED' => '<span class="badge rounded-pill badge-success">' . $status . '</span>',
            default => $status,
        };
    }

    // RATING
    private function rating($rating)
    {
        // Pastikan rating adalah angka dan berada dalam rentang 1-5
        $rating = (int) $rating;
        if ($rating < 1) $rating = 1;
        if ($rating > 5) $rating = 5;

        $html = '<div class="rating">';

        // Lakukan perulangan 5 kali untuk 5 bintang
        for ($i = 1; $i <= 5; $i++) {
            // Jika nomor iterasi lebih kecil atau sama dengan rating, tampilkan bintang penuh
            if ($i <= $rating) {
                $html .= '<i class="fa-solid fa-star txt-warning"></i>';
            } else {
                // Jika tidak, tampilkan bintang kosong
                $html .= '<i class="fa-regular fa-star txt-warning"></i>';
            }
        }

        $html .= '</div>';

        return $html;
    }
}
