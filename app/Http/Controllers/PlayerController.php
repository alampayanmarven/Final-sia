<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PlayerController extends Controller
{
    public function index() {
        $players = Player::orderBy('id')->get();
        return view('player', compact('players'));

    }

    public function generateCSV() {
        $players = Player::orderBy('id')->get();

        $filename = 'playaers.csv';

        $file = fopen('php://temp', 'w+');


        fputcsv($file, ['ID', 'Position', 'Name', 'Jersey Number']);

        foreach($players as $player) {
            fputcsv($file, [
                $player->id,
                $player->position,
                $player->name,
                $player->jersey_number,

            ]);
        }

        rewind($file);

        $response = response(stream_get_contents($file), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);

        fclose($file);

        return $response;
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $filePath = $file->getRealPath();

        $csvData = array_map('str_getcsv', file($filePath));

        // Skip the header row
        $headerSkipped = false;
        foreach ($csvData as $row) {
            if (!$headerSkipped) {
                $headerSkipped = true;
                continue;
            }

            // Ensure that the CSV file has at least 3 columns
            if (count($row) >= 3) {
                $position = $row[0];
                $name = $row[1];
                $jersey_number = $row[2];

                // Validate that jersey_number is an integer
                if (is_numeric($jersey_number)) {
                    Player::create([
                        'position' => $position,
                        'name' => $name,
                        'jersey_number' => (int) $jersey_number,
                    ]);
                }
            }
        }

        return redirect()->route('players')->with('success', 'Players imported successfully.');
    }




    public function pdf(){
        $players = Player::orderBy('position')->get();
        $pdf = Pdf::loadView('player-list', compact('players'));

        return $pdf->download('player-list.pdf');
    }
}
