<?php

require('../FPDF/fpdf.php');

    class PDF extends FPDF{

        function show($data){
            $this->AddPage();
            $this->SetFont('Arial','',16);
            $this->Cell(0,0,'Student Detail', 0, 1, 'C');
            $this->Ln(12);
            $this->Cell(40,10,'Name', 0, 0, 'L');
            $this->Cell(130,10,ucfirst($data[0]['name']), 0, 1, 'R');
            $this->Cell(40,10,'Father Name', 0, 0, 'L');
            $this->Cell(130,10,ucfirst($data[0]['father_name']), 0, 1, 'R');

            $this->Cell(40,10,'Email', 0, 0, 'L');
            $this->Cell(130,10,$data[0]['email'], 0, 1, 'R');
            $this->Cell(40,10,'Fruit', 0, 0, 'L');
            $this->Cell(130,10,ucfirst($data[0]['fruit']), 0, 1, 'R');

            $this->Cell(40,10,'Date', 0, 0, 'L');
            $this->Cell(130,10,$data[0]['date'], 0, 1, 'R');
            $this->Cell(40,10,'Wake up Time', 0, 0, 'L');
            $this->Cell(130,10,ucfirst($data[0]['time']), 0, 1, 'R');

            $this->Cell(40,10,'languages', 0, 0, 'L');
            $this->Cell(130,10,$data[0]['language'], 0, 1, 'R');
            $this->Cell(40,10,'Gender', 0, 0, 'L');
            $this->Cell(130,10,ucfirst($data[0]['gender']), 0, 1, 'R');

            $this->Output();
        }

    }
