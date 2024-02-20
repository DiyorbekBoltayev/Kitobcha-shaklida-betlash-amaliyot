<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"
          integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw=="
          crossorigin="anonymous"/>
    <title>Booklet Printing Calculator | 4 pages per sheet</title>
    <script type="text/javascript">


        function calculate() {
            // set options to variables
            duplex = document.getElementById('duplex').value;
            direction = document.getElementById('direction').value;
            pageMode = document.getElementById('pageMode').value;

            // show different elements based on duplex option
            if (duplex == "Yes") {
                document.getElementById("doublesided").style.display = "block";
                document.getElementById("singlesided").style.display = "none";
            } else {
                document.getElementById("doublesided").style.display = "none";
                document.getElementById("singlesided").style.display = "block";
            }

            // set option to variable
            count = document.getElementById('count').value;
            var duplexlist = '';
            var side1list = '';
            var side2list = '';


            switch (pageMode) {

                // for 2 page per sheet booklet
                case '2':
                    var pagesPerPaper = 4
                    var pageRemainder = count % pagesPerPaper
                    document.getElementById('prep-tip-1-1').textContent = pagesPerPaper.toString();
                    document.getElementById('prep-tip-1-2').textContent = "4 yoki 8 yoki 12 va h.k";

                    var printTip1 = "Set your printer's \x22pages per side\x22 setting to " + (pagesPerPaper / 2) + ".";
                    document.getElementById('print-tip-doublesided-1').textContent = printTip1;
                    document.getElementById('print-tip-singlesided-1').textContent = printTip1;

                    var printTip10 = "Fold to create your booklet!"
                    document.getElementById('print-tip-doublesided-10').textContent = printTip10;
                    document.getElementById('print-tip-singlesided-10').textContent = printTip10;
                    if (pageRemainder === 0) {

                        for (var i = 1; i < count / 2; i = i + 2) {
                            var newside1;
                            var newside2;
                            if (direction == "LTR") {
                                var newside1 = (count - i + 1).toString() + ',' + i.toString() + ',';
                                var newside2 = (i + 1).toString() + ',' + (count - i).toString() + ',';
                            } else {
                                // RTL; this is the above two lines with each pair of numbers in the
                                // other order
                                var newside1 = i.toString() + ',' + (count - i + 1).toString() + ',';
                                var newside2 = (count - i).toString() + ',' + (i + 1).toString() + ',';
                            }

                            side1list = side1list + newside1;
                            side2list = side2list + newside2;
                            duplexlist = duplexlist + newside1 + newside2;

                        }
                    } else {
                        side1list = "Not divisible by " + pagesPerPaper + ". Need " + (pagesPerPaper - pageRemainder) + " more page(s).,";
                        side2list = "";
                        duplexlist = "Not divisible by " + pagesPerPaper + ". Need " + (pagesPerPaper - pageRemainder) + " more page(s).,";
                    }
                    break;

                case '4':
                    var pagesPerPaper = 8
                    var pageRemainder = count % pagesPerPaper
                    document.getElementById('prep-tip-1-1').textContent = pagesPerPaper.toString();
                    document.getElementById('prep-tip-1-2').textContent = "8 yoki 16 yoki 24 va h.k";

                    var printTip1 = "Set your printer's \x22pages per side\x22 setting to " + (pagesPerPaper / 2) + ".";
                    document.getElementById('print-tip-doublesided-1').textContent = printTip1;
                    document.getElementById('print-tip-singlesided-1').textContent = printTip1;


                    var printTip10single = "Flip the pile so that the first page is facing up. Cut the pages in the middle horizontally to create a top and bottom pile. Place the top pile on top of the bottom pile then fold!";
                    var printTip10double = "Cut the pages in the middle horizontally to create a top and bottom pile. Place the top pile on top of the bottom pile then fold!";
                    document.getElementById('print-tip-doublesided-10').textContent = printTip10double;
                    document.getElementById('print-tip-singlesided-10').textContent = printTip10single;


                    if (pageRemainder === 0) {
                        for (var i = 1; i < count / 4; i = i + 2) {
                            var newside1;
                            var newside2;
                            if (direction == "LTR") {
                                var newside1 = (count - i + 1).toString() + ',' + i.toString() + ','
                                    + (count - (count / 4) - i + 1).toString() + ',' + (i + (count / 4)).toString() + ',';
                                var newside2 = (i + 1).toString() + ',' + (count - i).toString() + ','
                                    + (i + 1 + (count / 4)).toString() + ',' + (count - i - (count / 4)).toString() + ',';
                            } else {
                                // RTL; this is the above two lines with each pair of numbers in the
                                // other order
                                var newside1 = i.toString() + ',' + (count - i + 1).toString() + ','
                                    + (i + (count / 4)).toString() + ',' + (count - (count / 4) - i + 1).toString() + ',';
                                var newside2 = (count - i).toString() + ',' + (i + 1).toString() + ','
                                    + (count - i - (count / 4)).toString() + ',' + (i + 1 + (count / 4)).toString() + ',';
                            }

                            side1list = side1list + newside1;
                            side2list = side2list + newside2;
                            duplexlist = duplexlist + newside1 + newside2;
                        }
                    } else {
                        side1list = "Not divisible by " + pagesPerPaper + ". Need " + (pagesPerPaper - pageRemainder) + " more page(s).,";
                        side2list = "";
                        duplexlist = "Not divisible by " + pagesPerPaper + ". Need " + (pagesPerPaper - pageRemainder) + " more page(s).,";
                    }

                    break;

                default:
                    break;
            }


            // delete last comma
            side1list = side1list.substr(0, side1list.length - 1);
            side2list = side2list.substr(0, side2list.length - 1);
            duplexlist = duplexlist.substr(0, duplexlist.length - 1);

            document.getElementById('side1list').value = side1list;
            document.getElementById('side2list').value = side2list;
            document.getElementById('duplexlist').value = duplexlist;
        }

        function init() {
            calculate();
        }

        function copyToClipboard(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/
            document.execCommand("copy");
            toastr.clear()
            toastr.info("Copied to clipboard");

        }

        document.addEventListener("DOMContentLoaded", init);

    </script>
    <style>
        li {
            line-height: 2em;
        }

        .btn {
            font-size: 18px;
        }

        .row {
            margin-left: 5%;
            margin-right: 5%;
            border-bottom: 2px solid #ececec;
            padding-bottom: 10%;
        }

        form {
            font-size: 17px;
        }

        #count_chosen {
            width: 100px !important;
        }
    </style>

</head>
<body>

<div class="jumbotron">
    <div class="container">
        <h1> Buklet chop etish</h1>
        <p> Har bir varaqda 2 yoki 4 sahifa chop eting. Siz bukletlarni oddiy printeringiz yordamida hech qanday
            qo'shimcha plaginlarni o'rnatmasdan chop etishingiz mumkin, hatto sizning dasturiy ta'minotingizda buklet
            yordami bo'lmasa ham.
        </p>
    </div>
</div>
<form class="inline-form">
    <div class="containter">
        <div class="row">
            <div class="col-md-6">
                <h3>Chop etishga tayyorlash</h3>
                <ul class="list-group">

                    <!-- adding option to specify how many pages per sheet-->
                    <li class="list-group-item">
                        Har bir varaqda qancha sahifa chop etishni xohlaysiz?
                        <select id="pageMode" onchange="calculate();">
                            <option value="2" selected>2 sahifa</option>
                            <option value="4">4 sahifa</option>
                        </select>
                    </li>

                    <li class="list-group-item" id='prep-tip-1'>Sahifalar soni <b id='prep-tip-1-1'>4</b> <b> ga
                            bo'linishiga ishonch hosil qiling
                        </b>, masalan <i id='prep-tip-1-2'>4 yoki 8 yoki 12 va h.k</i>
                        . Agar unday bo'lmasa bo'sh sahifa qo'shing.
                    </li>
                    <li class="list-group-item">
                        <p>Sahifalar sonini kiriting:</p>
                        <div class="input-group">
                            <input class="form-control w-75" type="text" size="4" id="count" value="16" onchange="calculate();" style="flex-grow: 1;"/>
                            <span class="input-group-btn w-25">
                            <button onclick="calculate();" title="Hisoblash" class="btn btn-primary" type="button">
                                <i class="fa fa-cogs"></i>
                            </button>
                            </span>
                        </div>


                    </li>
                    <li class="list-group-item">
                        Printeringiz bir vaqtning o'zida ikkala tomonini ham chop qila oladimi?
                        <select id="duplex" onchange="calculate();">
                            <option value="No" selected>Yo'q</option>
                            <option value="Yes">Ha</option>
                        </select>
                    </li>
                    <li class="list-group-item">
                        Yozuvlar chapdan-o'ngga qarab o'qiladimi (O'zbekcha, Ruscha, Inglizcha va h.k) yoki
                        o'ngdan-chapga qarab o'qiladimi (Arabcha, Forscha va h.k)?
                        <select id="direction" onchange="calculate();">
                            <option value="LTR">Chapdan-o'ngga</option>
                            <option value="RTL">O'ngdan-chapga</option>
                        </select>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Chop etish</h3>

                <!-- double sided output -->
                <ul class="list-group" id="doublesided">
                    <li class="list-group-item" id="print-tip-doublesided-1"> &nbsp;</li>

                    <li class="list-group-item" id="print-tip-doublesided-3">Print pages in this order:
                        <div class="input-group">
                            <input class="form-control" type="text" id="duplexlist" size="50"/>
                            <span class="input-group-btn">
                  <button onclick="copyToClipboard('duplexlist');" title="Copy to clipboard" class="btn btn-info"
                          type="button"><i class="fa fa-clone"></i></button>
                </span>
                        </div>
                    </li>
                    <li class="list-group-item" id="print-tip-doublesided-10">
                        &nbsp;
                    </li>
                </ul>

                <!-- single sided output -->
                <ul class="list-group" id="singlesided">
                    <li class="list-group-item" id="print-tip-singlesided-1"> &nbsp;</li>
                    <li class="list-group-item" id="print-tip-singlesided-2">Print these pages first:
                        <div class="input-group">
                            <input class="form-control" type="text" id="side1list" size="50"/>
                            <span class="input-group-btn">
                  <button onclick="copyToClipboard('side1list');" title="Copy to clipboard" class="btn btn-info"
                          type="button"><i class="fa fa-clone"></i></button>
                </span>
                        </div>
                    </li>
                    <li class="list-group-item" id="print-tip-singlesided-3">Flip the printed pages and put them back
                        into your printer.
                    </li>
                    <li class="list-group-item" id="print-tip-singlesided-4">Now print these pages:
                        <div class="input-group">
                            <input class="form-control" type="text" id="side2list" size="50"/>
                            <span class="input-group-btn">
                  <button onclick="copyToClipboard('side2list');" title="Copy to clipboard" class="btn btn-info"
                          type="button"><i class="fa fa-clone"></i></button>
                </span>
                        </div>
                    </li>
                    <li class="list-group-item" id="print-tip-singlesided-10">
                        &nbsp;
                    </li>
                </ul>


            </div>
        </div>
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"
        integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g=="
        crossorigin="anonymous"></script>
<script>
    $(".chosen-select").chosen();

</script>

</body>
</html>
