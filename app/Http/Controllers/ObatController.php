php<?
// app/Http/Controllers/ObatController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Obat;
class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return view('obat.index', compact('obat'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $obat = Obat::where('nama', 'like', "%$query%")->get();
        return view('obat.index', compact('obat'));
    }
}
