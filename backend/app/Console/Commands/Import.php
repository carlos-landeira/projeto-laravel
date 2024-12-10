<?php

namespace App\Console\Commands;

use App\Models\Song;
use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa os dados do arquivo CSV para o banco de dados';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = $this->argument('filename');

        if (!file_exists($filename)) {
            $this->error("Arquivo {$filename} não encontrado.");
            return;
        }

        $file = fopen($filename, 'r');
        $isFirstLine = true;

        while (($line = fgetcsv($file)) !== false) {
            if ($isFirstLine) {
                $isFirstLine = false;
                continue;
            }

            if (count($line) < 10) {
                $this->error('Arquivo CSV inválido.');
                return;
            }

            $data = [
                'title'     => $line[0],
                'artist'    => $line[1],
                'album'     => $line[2],
                'isrc'      => $line[3],
                'platform'  => $line[4],
                'trackId'   => $line[5],
                'duration'  => $line[6],
                'addedDate' => $line[7],
                'addedBy'   => $line[8],
                'url'       => $line[9],
            ];

            $song = new Song();
            $song->fill($data);

            if (!$song->save()) {
                $this->error("Erro ao salvar a música: {$data['title']}");
            }
        }

        fclose($file);
        $this->info("Importação concluída.");
    }
}
