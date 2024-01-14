<?php

require_once __DIR__ . '/../../libraries/fpdf.php';
require_once __DIR__ . '/panier.php';
require_once __DIR__ . '/boisson.php';
require_once __DIR__ . '/fruitssec.php';
require_once __DIR__ . '/biscuit.php';
require_once '../Model/logins.php';
require_once '../Model/Products.php';
require_once '../Model/Orders.php';

class PDF extends FPDF
{
    function BasicTable($header, $data)
    {
        // En-tête
        $height = 12;
        $this->SetFont('Arial', 'B', 10);
        foreach ($header as $col) {
            $str = iconv('UTF-8', 'windows-1252', $col);
            $this->Cell(38, $height, $str, "TB");
        }
        $this->Ln(); // Données

        // Ajouter les données du panier
        foreach ($data as $row) {
            foreach ($row as $col) {
                if (substr($col, -3) === "jpg" || substr($col, -3) === "png" ) {
                    $this->Cell(38, $height, "", "TB");
                }else{
                    $str = iconv('UTF-8', 'windows-1252', $col);
                    $this->Cell(38, $height, $str, "TB");
                }

            }
            $this->Ln();
        }
    }
}
$username = $_COOKIE['username'] ?? null;
$password = $_COOKIE['password'] ?? null;
$login = new Logins();
$resultat = $login->seConnecter($username, $password);
$id_panier = $resultat[0]["id_panier"];
$panier = new panier();
$panier_data = $panier -> getContenu($id_panier);

$pdf = new PDF(); // Use the custom PDF class
$pdf->AddPage();

// Titre
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(38, 12, "Facture pour votre commande", "");

$pdf->Ln();
$pdf->Ln();

// Recapitulatif de commande
$header = array('id', 'Nom du produit', '', 'Prix', 'Quantité');
$pdf->BasicTable($header, $panier_data);

// Total
$total = 0;
foreach ($panier_data as $product) {
    $total += $product['price'] * $product['nombre_occurrences'];
}

$pdf->ln();
$pdf->cell(120, 6, "");
$pdf->SetFont('Arial', 'B', 10);
$str = iconv('UTF-8', 'windows-1252', "Total facturé:");
$pdf->cell(38, 6, $str, "TLB");

$pdf->SetFont('Arial', '', 10);
$str = iconv('UTF-8', 'windows-1252', $total . "€");
$pdf->cell(30, 6, $str, "TRB");

$pdf->ln();
$pdf->ln();
$pdf->ln();
// Indication chèque

$pdf->SetFont('Arial', 'I', 10);
$str = iconv('UTF-8', 'windows-1252', "Afin de régler votre commande, nous vous prions de bien vouloir nous faire parvenir un chèque d'une valeur du montant");
$pdf->cell(30, 6, $str);
$pdf->ln();
$str = iconv('UTF-8', 'windows-1252', "indiqué dans le champ `Total facturé` à l'ordre SARL LABOUTIQUEFRANCAISE à l'adresse suivante:");
$pdf->cell(30, 6, $str);
$pdf->ln();
$pdf->SetFont('Arial', '', 12);
$str = iconv('UTF-8', 'windows-1252', "67 rue Voltaire, 69003 Lyon");
$pdf->ln();
$pdf->cell(50, 6, "");
$pdf->cell(30, 6, $str);

$pdf->ln();
$pdf->ln();
$pdf->ln();

$pdf->SetFont('Arial', 'I', 10);
$str = iconv('UTF-8', 'windows-1252', "Nous vous remercions pour votre confiance et espérons vous revoir très prochainement sur LaBoutiqueFrançaise.com !");
$pdf->cell(30, 6, $str);
$pdf->ln();

$pdf->Output('', 'facture.pdf');
$panier->viderPanier($id_panier);