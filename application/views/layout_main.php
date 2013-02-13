<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $this->lang->line('site_title');?></title>


    <?php if (($this->session->userdata('ver') == "english") or ($this->session->userdata('ver') == "")) { ?>
    <link href="/assets/css/style.css?v=4" rel="stylesheet" type="text/css"/>
    <?php } else { ?>
    <link href="/assets/css/style-de.css?v=4" rel="stylesheet" type="text/css"/>
    <?php } ?>
    <link rel="stylesheet" href="/assets/css/jquery-ui-1.8.21.custom.css" type="text/css"/>

    <script type="text/javascript" src="/assets/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/assets/js/custom-select.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets/js/scripts.js"></script>
    <script type="text/javascript" src="/assets/js/app.js?v=3"></script>
    <script type="text/javascript" src="/assets/js/jquery-ui-1.8.21.custom.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.alphanumeric.pack.js"></script>
</head>

<body>

<div class="header">
    <div class="wrapper">
        <div class="top">
            <script type="text/javascript">
                document.write("<a href='mailto:" + "contact" + "@" + "skiservice-corvatsch" + "." + "com'>");
                document.write("contact" + "@" + "skiservice-corvatsch" + "." + "com");
                document.write("</a>");
            </script>
            // +41 81 838 77 77
            <?php $language = $this->session->userdata('ver'); ?>
            <div class="languages">
                <form name="language_change" id="language_change">
                    <ul>
                        <li class="first <?php echo (empty($language) or $language == 'english') ? '' : 'selected' ?>"
                            id="English" class="version"><a href="javascript:void(0)"
                                                            onclick="changeLanguage('german')">DE</a></li>
                        <li class="<?php echo (!empty($language) && $language == 'german') ? '' : 'selected' ?>"
                            id="german" class="version"><a href="javascript:void(0)"
                                                           onclick="changeLanguage('english')">EN</a></li>
                        <input type="hidden" name="language" id="language"/>
                    </ul>
                </form>

            </div>
        </div>

        <a href="/" class="logo"></a>
        <span class="slogan" style="font-size:31px; line-height: 1;"><?php echo $this->lang->line('slogan_1');?>
            <br/><?php echo $this->lang->line('slogan_2');?><p
                    style="font-size:15px"><?php echo $this->lang->line('slogan_3');?> </p></span>

        <div class="steps">
            <span class="step <?php echo ($step == 1) ? 'activated' : '' ?>">1</span>
            <span class="step <?php echo ($step == 2) ? 'activated' : '' ?>">2</span>
            <span class="step <?php echo ($step == 3) ? 'activated' : '' ?>">3</span>
            <span class="step <?php echo ($step == 4) ? 'activated' : '' ?>">4</span>
        </div>
    </div>
</div>


<?php echo $content_for_layout; ?>

<div class="footer">
    <div class="wrapper">

        <div class="design">
            <?php echo $this->lang->line('website_by');?>&nbsp;<a href=" http://www.design-terminal.com"
                                                                  target="_blank"><?php echo $this->lang->line('design_terminal');?></a>
        </div>

        <!-- end of design -->
        &copy; <?php echo date("Y") . " " . $this->lang->line('rights');?> &nbsp; <a href="#terms"
                                                                                     class="activatePopup"><?php echo $this->lang->line('terms_conditions')?></a>
    </div>
    <!-- end of wrapper -->
</div>

<!-- end of footer -->

<?php if ($this->session->userdata('ver') == "english") { ?>
<div class="popup productspopup" id="terms">

    <div class="close"></div>

    <div>
        <div style="padding:10px 20px;overflow: auto;height: 500px;text-align: justify">


            <strong>General Terms and Conditions Skiservice Corvatsch AG</strong>
            <br/><br/>

            <strong>Scope of application</strong><br/><br/>
            The following General Terms and Conditions apply between Skiservice Corvatsch AG and the Customer
            (hereinafter referred
            to as the Customer). They are restricted to reservations for rental equipment made and paid for online.<br/><br/>


            <strong>Online rental</strong><br/><br/>
            Customers who rent and pay for their rental equipment online receive immediate confirmation via e-mail.<br/><br/>

            <strong>Prices</strong><br/><br/>
            The prices published by each Skiservice Corvatsch AG apply. For booking/paying online, the rental price must
            be paid by
            credit card/Postcard. The prices include all statutory taxes and charges.<br/><br/>

            <strong>Insurance</strong><br/><br/>
            The Customer must pay for all insurance such as third-party liability, breakage, equipment defect, theft,
            etc. Skiservice
            Corvatsch AG provides no insurance whatsoever. By agreement with the Customer, Skiservice Corvatsch AG will
            levy an extra
            charge of 10% of the total rental price to cover breakage and theft.<br/><br/>

            <strong>Cancellation</strong><br/><br/>
            Cancellation may only be made due to illness, accident or other serious reason (e.g. death of a close
            relative or of
            persons travelling with you). Skiservice Corvatsch AG must be notified in writing of the cancellation,
            setting out the
            reasons for the cancellation. For the cancellation of a booking/payment, Skiservice Corvatsch AG shall
            charge a cancellation
            fee of CHF 25.– for each person for whom a booking was made. The Customer has the possibility of reducing
            the cancellation
            costs by paying an additional 5% cancellation fee when booking rental equipment online. This is
            non-refundable. The difference
            between the amount already paid and the cancellation costs will be promptly refunded to the Customer. No
            rental price refund is
            given if the Customer collects the rental equipment late, or for whatever other reason, is unable to collect
            the equipment at all.
            The same shall apply if the Customer returns the rental equipment to the rental agent early.<br/><br/>

            Adverse weather conditions or other obstacles that are beyond the control of Skiservice Corvatsch AG do not
            entitle the
            Customer to cancel. In the event of injury or illness of the Customer during the rental term, the following
            provisions
            shall apply, upon submission of a medical certificate:  a) A refund of the rental price is possible only if
            the rented
            equipment is returned to the rental agency immediately upon the occurrence of the injury or onset of the
            illness.  b) If
            Point a) is complied with, the excess rental sum paid will be refunded from the date of issue of the medical
            certificate,
            which must be submitted. No refund is possible without a medical certificate.  c) As soon as Skiservice
            Corvatsch AG is
            notified of an illness/injury and points a) and b) are complied with, it shall remit the excess rental sum
            already paid.<br/><br/>

            <strong>Claims</strong><br/><br/>
            Claims of any kind relating to a reservation must be addressed to Skiservice Corvatsch AG in writing
            immediately upon
            receipt of the booking confirmation. In the event of later claims, the Customer shall bear the full loss
            resulting therefrom.<br/><br/>

            <strong>Extended benefits</strong><br/><br/>
            Extended benefits such as changing to a higher category, additional rental equipment etc. can only be
            arranged locally
            with the Skiservice Corvatsch AG in question. In the event of a change to a lower category, there will be no
            refund/reduction
            of the price.<br/><br/>

            <strong>Collection and return of the rental equipment</strong><br/><br/>
            The Customer shall collect the equipment on the first day of rental from the rental agent specified on the
            booking confirmation.
            Upon request, the equipment may be collected after 15:30 on the day before the first day of rental. The
            equipment must be
            returned before close of business on the last day of the agreed rental period. In the event of longer usage
            of the equipment,
            the difference between the rental term paid for and the period for which the equipment was actually used
            shall be charged,
            under the normal rental terms that apply locally. This sum is to be paid directly at the location.<br/><br/>

            <strong>Deposit guarantee</strong><br/><br/>
            Credit card shall be acceptable as a deposit guarantee.<br/><br/>

            <strong>Data protection</strong><br/><br/>
            The Customer agrees to the collection and use of personal data for the processing of the rental transaction
            and the further
            information of the Customer. Skiservice Corvatsch AG warrants simultaneously that it will use the data it
            collects only
            for the above purposes and will not pass these data on to third parties.<br/><br/>

            <strong>Changes to this data protection declaration</strong><br/><br/>
            Skiservice Corvatsch AG may amend this data protection declaration at any time. Any changes will be reported
            here.<br/><br/>

            <strong>Liability</strong><br/><br/>
            Any liability claims relating to the rental equipment arising on the grounds of theft, breakage, claims from
            ski or
            snowboard accidents, etc. shall be asserted solely against the rental agency in each case.<br/><br/>

            <strong>Applicable law and court of jurisdiction</strong><br/><br/>
            Swiss law shall apply for these General Booking Terms. Sole court of jurisdiction is Silvaplana. Skiservice
            Corvatsch AG
            reserves the right to prosecute the Customer at the location of its registered office or place of residence
            or before any
            other appropriate court or competent authorities.


        </div>

        <div class="controls"></div>

    </div>

</div>
    <?php } else { ?>
<div class="popup productspopup" id="terms">

    <div class="close"></div>

    <div>
        <div style="padding:10px 20px;overflow: auto;height: 500px;text-align: justify">


            <strong>Allgemeine Gesch&auml;ftsbedingungen Skiservice Corvatsch AG</strong><br/><br/><br/><br/>

            <strong>Geltungsbereich</strong><br/><br/>

            Die nachstehenden Allgemeinen Gesch&auml;ftsbedingungen gelten zwischen der Skiservice Corvatsch AG und dem
            Kunden (nachfolgend Mieter genannt). Sie beschr&auml;nken sich ausschliesslich auf die Buchung/Bezahlung von
            Mietmaterial via Internet.<br/><br/>

            <strong>Online Buchung/Zahlung/Reservation</strong><br/><br/>

            Kunden, die ihr Mietmaterial online buchen und zahlen, respektive reservieren, erhalten via E-Mail umgehend
            eine Best&auml;tigung.<br/><br/>

            <strong>Preise</strong><br/><br/>

            Als verbindlich gelten die von der Skiservice Corvatsch AG publizierten Preise. Der Mietpreis ist bei einer
            Buchung/Zahlung online mittels Kreditkarte zu begleichen. Die Preise beinhalten alle gesetzlichen Steuern
            und Abgaben.<br/><br/>

            <strong>Versicherung</strong><br/><br/>

            S&auml;mtliche Versicherungen wie Haftpflicht, Bruch, Materialdefekt, Diebstahl usw. ist Sache der Mieter.
            Skiservice CorvatschAGschliesst s&auml;mtliche Haftungen aus. Der Mieter hat die M&ouml;glichkeit, eine
            Ski-Bruch/Diebstahl-Versicherung abzuschliessen. Die Pr&auml;mie betr&auml;gt pauschal 10% des
            Gesamtmietpreises.<br/><br/>

            <strong>Annullierung</strong><br/><br/>

            Eine Annullierung ist ausschliesslich infolge Krankheit, Unfall oder sonstiger schwerwiegender Gr&uuml;nde
            (z.B. Todesfall naher Angeh&ouml;riger oder mitreisender Angeh&ouml;riger) m&ouml;glich. Die Annullierung
            ist der Skiservice Corvatsch AG schriftlich und begr&uuml;ndet anzuzeigen. Skiservice Corvatsch AG berechnet
            f&uuml;r die Annullierung einer Buchung/Zahlung Annullierungskosten in der H&ouml;he von CHF 25.– pro
            Person, f&uuml;r welche gebucht wurde. Der Mieter hat die M&ouml;glichkeit, die Annullierungskosten zu
            reduzieren, indem er bei Buchung/Zahlung online einer Mietausr&uuml;stung eine 5% Annullierungsgarantie zus&auml;tzlich
            bezahlt; diese wird nicht zur&uuml;ckerstattet. Die Differenz zwischen dem bereits bezahlten Betrag und den
            Annullierungskosten wird dem Mieter umgehend zur&uuml;ckerstattet.<br/><br/>

            Keine Mietpreisr&uuml;ckerstattung wird gew&auml;hrt, wenn die Wintersportausr&uuml;stung seitens des
            Mieters versp&auml;tet entgegengenommen wird oder aus irgendwelchen anderen Gr&uuml;nden &uuml;berhaupt
            nicht entgegengenommen werden kann. Gleiches gilt, wenn der Mieter die Wintersportausr&uuml;stung vorzeitig
            dem Vermieter zur&uuml;ckgibt.<br/><br/>

            Ung&uuml;nstige Witterung oder andere Behinderungen, die nicht im Machtbereich der Skiservice Corvatsch AG
            liegen, berechtigen nicht zur Annullierung. Bei Verletzung oder Erkrankung eines Kunden w&auml;hrend der
            Mietdauer gilt unter Vorlage eines Arztzeugnisses folgende Regelung:<br />

             a) eine R&uuml;ckerstattung der Miete ist nur dann m&ouml;glich, wenn das Mietmaterial sofort nach
                Eintritt der Erkrankung/Verletzung an den Vermieter zur&uuml;ckgegeben wird.<br />

             b) ist Punkt a) erf&uuml;llt, so wird der zu viel bezahlte Mietbetrag ab Ausstellungsdatum des erw&auml;hnten
                Arztzeugnisses r&uuml;ckerstattet. Ohne &auml;rztliches Zeugnis ist keine R&uuml;ckerstattung m&ouml;glich.<br />

             c) sobald die Skiservice Corvatsch AG Kenntnis von der Erkrankung/Verletzung hat sowie Punkte a) und b)
                erf&uuml;llt sind, erstattet sie die zu viel bezahlte Miete zur&uuml;ck.<br/><br/>

            <strong>Beanstandungen</strong><br/><br/>

            Beanstandungen jeglicher Art, die die Buchung betreffen, sind sofort nach Erhalt der Buchungsbest&auml;tigung
            schriftlich (per Fax, E-Mail, postalisch) an Skiservice Corvatsch AG zu richten. Bei sp&auml;teren
            Beanstandungen tr&auml;gt der Mieter den gesamten daraus entstandenen Nachteil.<br/><br/>

            <strong>Zusatzleistungen</strong><br/><br/>

            Zusatzleistungen wie Kategorienwechsel in eine h&ouml;here Kategorie, zus&auml;tzliches Mietmaterial usw.
            kann ausschliesslich mit der jeweiligen Gesch&auml;ftsstelle der Skiservice Corvatsch AG vor Ort vereinbart
            werden. Bei Kategorienwechsel in eine tiefere Kategorie erfolgt keine R&uuml;ckerstattung/Reduktion des
            Preises.<br/><br/>

            <strong>Entgegennahme und R&uuml;ckgabe der Mietausr&uuml;stung</strong><br/><br/>

            Die Entgegennahme der Mietausr&uuml;stung durch den Mieter erfolgt am 1. Miettag bei dem auf der
            Buchungsbest&auml;tigung angef&uuml;hrten Vermieter. Auf Wunsch kann die Entgegennahme der Mietausr&uuml;stung
            am Tag vor dem ersten Miettag ab 15.30 Uhr erfolgen.<br /><br />

            Die R&uuml;ckgabe der Mietausr&uuml;stung hat am letzten Tag der vereinbarten Mietperiode vor Gesch&auml;ftsschluss
            zu erfolgen. Im Falle einer l&auml;ngeren Inanspruchnahme der Mietausr&uuml;stung wird die Differenz
            zwischen der tats&auml;chlich in Anspruch genommenen Mietdauer und der bezahlten Mietdauer zu den vor
            Ort &uuml;blichen Mietkonditionen berechnet. Dieser Betrag ist direkt vor Ort zu bezahlen.<br/><br/>

            <strong>Depotgarantie</strong><br/><br/>

            Als Depotgarantie gilt der Kreditkartenabzug.<br /><br/>

            <strong>Datenschutz</strong><br/><br/>

            Der Mieter erkl&auml;rt sich mit der Erhebung und Weiterverarbeitung der personenbezogenen Daten f&uuml;r
            die Abwicklung der Miete und der weiteren Information des Mieters einverstanden. Die Skiservice Corvatsch AG
            verpflichtet sich gleichzeitig, die erhobenen Daten nur f&uuml;r die oben angef&uuml;hrten Zwecke zu
            verwenden und diese nicht an Dritte weiterzugeben.<br/><br/>

            <strong>Haftung</strong><br/><br/>

            Eventuelle Haftungsanspr&uuml;che betreffend der Mietausr&uuml;stung, die auf Grund von Diebstahl, Bruch,
            Anspr&uuml;chen aus Ski- und Snowboardunf&auml;llen usw. entstehen, sind ausschliesslich gegen&uuml;ber dem
            jeweiligen Vermieter geltend zu machen.

            <br /><br />
            <strong>Rechtswahl und Gerichtsstand</strong><br/><br/>

            Auf diese Allgemeinen Buchungsbedingungen ist schweizerisches Recht anwendbar. Ausschliesslicher
            Gerichtsstand ist Silvaplana. Die Skiservice Corvatsch AG beh&auml;lt sich das Recht vor, den Mieter an
            dessen Sitz oder Wohnsitz oder vor jedem anderen zust&auml;ndigen Gericht oder jeder anderen zust&auml;ndigen
            Beh&ouml;rde zu belangen.


        </div>

        <div class="controls"></div>

    </div>

</div>
    <?php } ?>



<script type="text/javascript">

    function changeLanguage(lan) {

        $('#language_change #language').val(lan);
        var url = window.location.pathname;

        $.ajax({
            type:"POST",
            url:"<?php echo base_url(); ?>language/switchLang/" + lan,
            data:'id=salayhin',
            dataType:"json",


            success:function (msg) {
                if (msg.status == "success") {
                    window.location = url;
                }
            }
        });
    }
</script>
</body>
</html>

