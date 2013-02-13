<?php

define("ZF_PATH", realpath(__DIR__));
set_include_path(get_include_path() . PATH_SEPARATOR . ZF_PATH);

require_once "Zend/Loader/Autoloader.php";
$loader = Zend_Loader_Autoloader::getInstance();

class Invoice
{
    protected $font;
    protected $fontBold;
    protected $fixedFont;
    protected $fixedFontBold;

    protected $invoice;
    protected $order;
    protected $rentals;

    protected $priceTotal = 0;
    protected $discount = 0;

    public function __construct()
    {
        $this->font = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA);
        $this->fontBold = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD);

        $this->fixedFont = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER);
        $this->fixedFontBold = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER_BOLD);
    }

    public function loadTemplate($template)
    {
        $this->invoice = Zend_Pdf::load($template);
    }

    public function setData($order, $rentals)
    {
        $this->order = $order;
        $this->rentals = $rentals;
    }

    public function generate()
    {
        $this->addHeaderInfo();
        $this->addLineItems();
        $this->addInvoiceTotals();
        $this->addRentalDetails();
    }

    private function addHeaderInfo()
    {
        $page = $this->invoice->pages[0];
        $page->setFont($this->fontBold, 16);

        $page->drawText("Invoice", 62, 690);

        $page->setFont($this->fontBold, 10);
        $page->drawText(html_entity_decode($this->order->full_name), 62, 650);

        $page->setFont($this->font, 10);
        $page->drawText(html_entity_decode($this->order->address), 62, 635);
        $page->drawText("Street " . $this->order->street_no . ', ' . $this->order->zip_code, 62, 620);
        $page->drawText(html_entity_decode($this->order->city) . ', ' . $this->order->country, 62, 605);
        $page->drawText($this->order->phone, 62, 590);

        $page->setFont($this->fontBold, 10);
        $page->drawText("Order Number:", 320, 650);
        $page->drawText("Order Date:", 320, 635);
        $page->drawText("Rent Location:", 320, 620);

        $page->setFont($this->font, 10);
        $page->drawText($this->order->order_code, 420, 650);
        $page->drawText(date("Y-m-d", strtotime($this->order->order_date)), 420, 635);
        $page->drawText($this->order->location, 420, 620);
    }

    private function addLineItems()
    {
        $index = 0;

        foreach ($this->rentals as $rental) {

            $rentalHeader = html_entity_decode($rental['first_name']) . ' ' . html_entity_decode($rental['last_name']);
            $rentalHeader .= " (" . str_replace('-', '/', $rental['date_start']) . " - " . str_replace('-', '/', $rental['date_end']) . "):";

            $this->printLineItem($index, $rentalHeader);
            $index++;

            foreach ($rental['products'] as $product) {
                $this->printLineItem($index, $product['title'], 1, $product['price'], $product['price']);
                $this->priceTotal += (float) $product['price'];
                $index++;
            }

        }
    }

    private function printLineItem($index, $text, $quantity = null, $price = null, $total = null)
    {
        $line = 535 - ($index * 25);

        $page = $this->invoice->pages[0];

        if (!$quantity && !$price && !$total) {
            $page->setFont($this->fontBold, 10);
            $page->drawText($text, 70, $line);
        } else {
            $page->setFont($this->font, 10);
            $page->drawText($text, 80, $line);
        }

        $page->setFont($this->fixedFont, 10);

        if ($quantity) {
            $page->drawText($quantity, 350, $line);
        }

        if ($price) {
            $page->drawText(sprintf("%6.2f CHF", (float) $price), 400, $line);
        }

        if ($total) {
            $page->drawText(sprintf("%6.2f CHF", (float) $total), 480, $line);
        }
    }

    private function addInvoiceTotals()
    {
        $page = $this->invoice->pages[0];

        $page->setFont($this->fontBold, 10);
        $page->drawText("Order Total: ", 400, 250);

        $page->setFont($this->fixedFont, 10);
        $page->drawText(sprintf("%6.2f CHF", (float) $this->priceTotal), 480, 250);

        $page->setFont($this->fontBold, 10);
        $page->drawText("(+) Insurance: ", 400, 235);

        $page->setFont($this->fixedFont, 10);
        $page->drawText(sprintf("%6.2f CHF", (float) $this->order->insurance_amount), 480, 235);

        $discountAmount = (float) $this->priceTotal + (float) $this->order->insurance_amount - (float) $this->order->total_amount;

        $page->setFont($this->fontBold, 10);
        $page->drawText("(-) Discount: ", 400, 220);

        $page->setFont($this->fixedFont, 10);
        $page->drawText(sprintf("%6.2f CHF", $discountAmount), 480, 220);

        $page->setFont($this->fixedFont, 10);
        $page->drawText("----------", 480, 205);

        $page->setFont($this->fixedFont, 10);
        $page->drawText(sprintf("%6.2f CHF", (float) $this->order->total_amount), 480, 190);
    }

    private function addRentalDetails()
    {
        $index = 0;

        foreach ($this->rentals as $key => $rental) {

            $rentalHeader = ($key + 1) . '. ' . html_entity_decode($rental['first_name']) . ' ' . html_entity_decode($rental['last_name']);
            $rentalHeader .= " (" . str_replace('-', '/', $rental['date_start']) . " - " . str_replace('-', '/', $rental['date_end']) . "):";

            $this->printRentalDetails($index, $rentalHeader);
            $index++;

            $rentalDetails = array(
                'Skill' => $rental['skill'],
                'Height' => $rental['height'] . 'cm',
                'Weight' => $rental['weight'] . 'kg',
                'Shoe Size' => $rental['shoe_size'] . 'EU'
            );

            $this->printRentalDetails($index, $rentalDetails, true);
            $index++;

        }
    }

    private function printRentalDetails($index, $data, $details = false)
    {
        $line = 170 - ($index * 20);
        $page = $this->invoice->pages[0];

        if (!$details) {
            $page->setFont($this->fontBold, 10);
            $page->drawText($data, 62, $line);
            return;
        }

        $pos = 0;

        foreach ($data as $key => $value) {

            $newPos = 62 + ($pos * 135);

            $page->setFont($this->fontBold, 10);
            $page->drawText(ucfirst($key) . ':', $newPos, $line);

            $page->setFont($this->font, 10);
            $page->drawText($value, $newPos + 55, $line);

            $pos++;
        }


    }

    public function save($filename)
    {
        $this->invoice->save($filename);
    }
}