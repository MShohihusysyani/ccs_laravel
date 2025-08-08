<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AjaxTicket extends Model
{
    protected $table = 'pelaporan';
    protected $primaryKey = 'id_pelaporan';

    protected $fillable = [
        'klien_id',
        'nama',
        'no_tiket',
        'judul',
        'perihal',
        'kategori',
        'priority',
        'max_day',
        'file',
        'tags',
        'impact',
        'status',
        'handle_by',
        'handle_by2',
        'handle_by3',
        'rating',
        'has_rated',
        'catatan_finish',
        'file_finish',
        'created_at',
        'finish_at',
        'mode_fokus',

    ];

    private static $columnOrder = [
        null,
        'pelaporan.no_tiket',
        'pelaporan.created_at',
        'pelaporan.klien_id',
        'pelaporan.nama',
        'pelaporan.perihal',
        'pelaporan.kategori',
        'pelaporan.tags',
        'pelaporan.priority',
        'pelaporan.maxday',
        'pelaporan.status',
        'pelaporan.handle_by',
        'pelaporan.handle_by2',
        'pelaporan.handle_by3'
    ];

    private static $columnSearch = [
        'pelaporan.no_tiket',
        'pelaporan.created_at',
        'pelaporan.klien_id',
        'pelaporan.nama',
        'pelaporan.judul',
        'pelaporan.perihal',
        'pelaporan.kategori',
        'pelaporan.tags',
        'pelaporan.priority',
        'pelaporan.maxday',
        'pelaporan.status',
        'pelaporan.handle_by',
        'pelaporan.handle_by2',
        'pelaporan.handle_by3'
    ];

    private static $defaultOrder = ['pelaporan.created_at' => 'DESC'];

    /**
     * Datatable query builder
     */
    // ALL TICKET
    public static function getDatatables(Request $request)
    {
        $query = self::query();

        // Search
        if ($request->input('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                foreach (self::$columnSearch as $col) {
                    $q->orWhere($col, 'like', '%' . $search . '%');
                }
            });
        }

        // Order
        if ($request->input('order.0.column') !== null) {
            $colIndex = (int)$request->input('order.0.column');
            $colName = self::$columnOrder[$colIndex] ?? 'created_at';
            $dir = $request->input('order.0.dir', 'desc');
            $query->orderBy($colName, $dir);
        } else {
            foreach (self::$defaultOrder as $col => $dir) {
                $query->orderBy($col, $dir);
            }
        }

        // Pagination
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        return $query->skip($start)->take($length)->get();
    }

    /**
     * Total semua data
     */
    public static function countAll()
    {
        return self::count();
    }

    /**
     * Total data yang sudah difilter
     */
    public static function countFiltered(Request $request)
    {
        $query = self::query();

        if ($request->input('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                foreach (self::$columnSearch as $col) {
                    $q->orWhere($col, 'like', '%' . $search . '%');
                }
            });
        }

        return $query->count();
    }

    // HANDLED
    public static function getDatatablesHandled(Request $request, array $filters = [])
    {
        $query = self::query()
            ->join('klien', 'pelaporan.klien_id', '=', 'klien.id_klien')
            ->select('pelaporan.*', 'klien.nama_klien')
            ->whereIn('pelaporan.status', ['HANDLED', 'HANDLED 2', 'ADDED2']);


        // Terapkan filter kustom
        if (!empty($filters['tanggal_awal']) && !empty($filters['tanggal_akhir'])) {
            $query->where('pelaporan.created_at', '>=', $filters['tanggal_awal'])
                ->where('pelaporan.created_at', '<=', $filters['tanggal_akhir']);
        }
        if (!empty($filters['nama_klien'])) {
            $query->where('pelaporan.klien_id', $filters['nama_klien']);
        }

        if (!empty($filters['nama_user'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('pelaporan.handle_by', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by2', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by3', 'like', '%' . $filters['nama_user'] . '%');
            });
        }

        // Search
        if ($request->input('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                foreach (self::$columnSearch as $col) {
                    $q->orWhere($col, 'like', '%' . $search . '%');
                }
            });
        }

        // Order
        if ($request->input('order.0.column') !== null) {
            $colIndex = (int)$request->input('order.0.column');
            $colName = self::$columnOrder[$colIndex] ?? 'created_at';
            $dir = $request->input('order.0.dir', 'desc');
            $query->orderBy($colName, $dir);
        } else {
            foreach (self::$defaultOrder as $col => $dir) {
                $query->orderBy($col, $dir);
            }
        }

        // Pagination
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        return $query->skip($start)->take($length)->get();
    }

    /**
     * Total semua data
     */
    public static function countAllHandled()
    {
        return self::whereIn('pelaporan.status', ['HANDLED', 'HANDLED 2', 'ADDED2'])->count();
    }

    public static function countFilteredHandled(Request $request, array $filters = [])
    {
        $query = self::query()
            ->join('klien', 'pelaporan.klien_id', '=', 'klien.id_klien')
            ->select('pelaporan.id_pelaporan')
            ->whereIn('pelaporan.status', ['HANDLED', 'HANDLED 2', 'ADDED2']);

        // Terapkan filter kustom
        if (!empty($filters['tanggal_awal']) && !empty($filters['tanggal_akhir'])) {
            $query->where('pelaporan.created_at', '>=', $filters['tanggal_awal'])
                ->where('pelaporan.created_at', '<=', $filters['tanggal_akhir']);
        }
        if (!empty($filters['nama_klien'])) {
            $query->where('pelaporan.klien_id', $filters['nama_klien']);
        }
        if (!empty($filters['nama_user'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('pelaporan.handle_by', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by2', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by3', 'like', '%' . $filters['nama_user'] . '%');
            });
        }

        // Search
        if ($request->input('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                foreach (self::$columnSearch as $col) {
                    $q->orWhere($col, 'like', '%' . $search . '%');
                }
            });
        }

        return $query->count();
    }

    // HANDLED 2
    public static function getDatatablesHandled2(Request $request, array $filters = [])
    {
        $query = self::query()
            ->join('klien', 'pelaporan.klien_id', '=', 'klien.id_klien')
            ->select('pelaporan.*', 'klien.nama_klien')
            ->where('pelaporan.status', 'HANDLED 2');


        // Terapkan filter kustom
        if (!empty($filters['tanggal_awal']) && !empty($filters['tanggal_akhir'])) {
            $query->where('pelaporan.created_at', '>=', $filters['tanggal_awal'])
                ->where('pelaporan.created_at', '<=', $filters['tanggal_akhir']);
        }
        if (!empty($filters['nama_klien'])) {
            $query->where('pelaporan.klien_id', $filters['nama_klien']);
        }

        if (!empty($filters['nama_user'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('pelaporan.handle_by', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by2', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by3', 'like', '%' . $filters['nama_user'] . '%');
            });
        }

        // Search
        if ($request->input('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                foreach (self::$columnSearch as $col) {
                    $q->orWhere($col, 'like', '%' . $search . '%');
                }
            });
        }

        // Order
        if ($request->input('order.0.column') !== null) {
            $colIndex = (int)$request->input('order.0.column');
            $colName = self::$columnOrder[$colIndex] ?? 'created_at';
            $dir = $request->input('order.0.dir', 'desc');
            $query->orderBy($colName, $dir);
        } else {
            foreach (self::$defaultOrder as $col => $dir) {
                $query->orderBy($col, $dir);
            }
        }

        // Pagination
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        return $query->skip($start)->take($length)->get();
    }

    /**
     * Total semua data
     */
    public static function countAllHandled2()
    {
        return self::where('pelaporan.status', 'HANDLED 2')->count();
    }

    public static function countFilteredHandled2(Request $request, array $filters = [])
    {
        $query = self::query()
            ->join('klien', 'pelaporan.klien_id', '=', 'klien.id_klien')
            ->select('pelaporan.id_pelaporan')
            ->where('pelaporan.status', 'HANDLED 2');

        // Terapkan filter kustom
        if (!empty($filters['tanggal_awal']) && !empty($filters['tanggal_akhir'])) {
            $query->where('pelaporan.created_at', '>=', $filters['tanggal_awal'])
                ->where('pelaporan.created_at', '<=', $filters['tanggal_akhir']);
        }
        if (!empty($filters['nama_klien'])) {
            $query->where('pelaporan.klien_id', $filters['nama_klien']);
        }
        if (!empty($filters['nama_user'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('pelaporan.handle_by', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by2', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by3', 'like', '%' . $filters['nama_user'] . '%');
            });
        }

        // Search
        if ($request->input('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                foreach (self::$columnSearch as $col) {
                    $q->orWhere($col, 'like', '%' . $search . '%');
                }
            });
        }

        return $query->count();
    }

    // FINISHED
    public static function getDatatablesFinished(Request $request, array $filters = [])
    {
        $query = self::query()
            ->join('klien', 'pelaporan.klien_id', '=', 'klien.id_klien')
            ->select('pelaporan.*', 'klien.nama_klien')
            ->where('pelaporan.status', 'FINISHED');


        // Terapkan filter kustom
        if (!empty($filters['tanggal_awal']) && !empty($filters['tanggal_akhir'])) {
            $query->where('pelaporan.created_at', '>=', $filters['tanggal_awal'])
                ->where('pelaporan.created_at', '<=', $filters['tanggal_akhir']);
        }
        if (!empty($filters['nama_klien'])) {
            $query->where('pelaporan.klien_id', $filters['nama_klien']);
        }

        if (!empty($filters['nama_user'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('pelaporan.handle_by', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by2', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by3', 'like', '%' . $filters['nama_user'] . '%');
            });
        }

        if (!empty($filters['rating'])) {
            $query->where('pelaporan.rating', $filters['rating']);
        }

        // Search
        if ($request->input('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                foreach (self::$columnSearch as $col) {
                    $q->orWhere($col, 'like', '%' . $search . '%');
                }
            });
        }

        // Order
        if ($request->input('order.0.column') !== null) {
            $colIndex = (int)$request->input('order.0.column');
            $colName = self::$columnOrder[$colIndex] ?? 'created_at';
            $dir = $request->input('order.0.dir', 'desc');
            $query->orderBy($colName, $dir);
        } else {
            foreach (self::$defaultOrder as $col => $dir) {
                $query->orderBy($col, $dir);
            }
        }

        // Pagination
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        return $query->skip($start)->take($length)->get();
    }

    /**
     * Total semua data
     */
    public static function countAllFinished()
    {
        return self::where('pelaporan.status', 'FINISHED')->count();
    }

    public static function countFilteredFinished(Request $request, array $filters = [])
    {
        $query = self::query()
            ->join('klien', 'pelaporan.klien_id', '=', 'klien.id_klien')
            ->select('pelaporan.id_pelaporan')
            ->where('pelaporan.status', 'FINISHED');

        // Terapkan filter kustom
        if (!empty($filters['tanggal_awal']) && !empty($filters['tanggal_akhir'])) {
            $query->where('pelaporan.created_at', '>=', $filters['tanggal_awal'])
                ->where('pelaporan.created_at', '<=', $filters['tanggal_akhir']);
        }
        if (!empty($filters['nama_klien'])) {
            $query->where('pelaporan.klien_id', $filters['nama_klien']);
        }
        if (!empty($filters['nama_user'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('pelaporan.handle_by', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by2', 'like', '%' . $filters['nama_user'] . '%')
                    ->orWhere('pelaporan.handle_by3', 'like', '%' . $filters['nama_user'] . '%');
            });
        }

        if (!empty($filters['rating'])) {
            $query->where('pelaporan.rating', $filters['rating']);
        }

        // Search
        if ($request->input('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                foreach (self::$columnSearch as $col) {
                    $q->orWhere($col, 'like', '%' . $search . '%');
                }
            });
        }

        return $query->count();
    }
}
