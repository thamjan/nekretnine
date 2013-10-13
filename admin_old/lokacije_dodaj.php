<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

    <!-- Mirrored from kilab.pl/simpleadmin/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 21 Sep 2013 10:17:47 GMT -->
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
        <title>Lokacije</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    </head>
    <body>
        <div class="wrap">
            <div id="header">
                <div id="top">
                    <div class="left">
                        <p>Dobrodošli, <strong>Željko</strong> [ <a href="#">odjava</a> ]</p>
                    </div>
                    <div class="right">
                        <div class="align-right">
                            <p>Poslednje logovanje: <strong>23-04-2012 23:12</strong></p>
                        </div>
                    </div>
                </div>
                <div id="nav">
                    <ul>
                        <li class="upp">
                            <a href="dashboard.html">Dashboard</a>

                        </li>
                        <li class="upp">
                            <a href="nekretnine_lista.html">Nekretnine</a>
                        </li>
                        <li class="upp">
                            <a href="vesti_lista.html">Vesti</a>
                        </li>
                        <li class="upp current_page">
                            <a href="lokacije_lista.html">Lokacije</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="content">
                <div id="sidebar">
                    <div class="box">
                        <div class="h_title">&#8250; Lokacije</div>
                        <ul id="home">
                            <li class="b2"><a class="icon report" href="lokacije_lista.html">Lista lokacija</a></li>
                            <li class="b1"><a class="icon add_page" href="lokacije_dodaj.html">Dodaj novu lokaciju</a></li>
                        </ul>
                    </div>

                </div>
                <div id="main">


                    <div class="full_w">
                        <div class="h_title">Dodavanje nove lokacije</div>

                        <div >
                            <h3><a href="#">Grad</a></h3>
                        </div>
                        <form action="#" method="post">
                            <div class="element">
                                <label for="name">Ime grada</label>
                                <input id="name" name="name" class="text err" />
                            </div>
                            <div class="entry">
                                <button type="submit" class="add">Dodaj</button>
                            </div>
                        </form>
                        <div class="sep"></div>
                        <div >
                            <h3><a href="#">Opština</a></h3>
                        </div>
                        <form action="#" method="post">
                            <div class="element">
                                <label for="category">Grad</label>
                                <select name="opstina_grad" class="err">
                                    <option value="0">-- izaberite grad</option>
                                    <option value="1">Beograd</option>
                                    <option value="2">Novi Sad</option>
                                </select>
                            </div>
                            <div class="element">
                                <label for="name">Ime opštine</label>
                                <input id="name" name="name" class="text err" />
                            </div>
                            <div class="entry">
                                <button type="submit" class="add">Dodaj</button>
                            </div>
                        </form>
                        <div class="sep"></div>

                        <div >
                            <h3><a href="#">MZ</a></h3>
                        </div>
                        <form action="#" method="post">
                            <div class="element">
                                <label for="category">Grad</label>
                                <select name="opstina_grad" class="err">
                                    <option value="0">-- izaberite grad</option>
                                    <option value="1">Beograd</option>
                                    <option value="2">Novi Sad</option>
                                </select>
                            </div>
                            <div class="element">
                                <label for="category">Opština</label>
                                <select name="opstina_grad" class="err">
                                    <option value="0">-- izaberite opštinu</option>
                                    <option value="1">Novi Beograd</option>
                                    <option value="2">Boleč</option>
                                </select>
                            </div>
                            <div class="element">
                                <label for="name">Ime MZ</label>
                                <input id="name" name="name" class="text err" />
                            </div>
                            <div class="entry">
                                <button type="submit" class="add">Dodaj</button>
                            </div>
                        </form>
                        <div class="sep"></div>


                    </div>

                </div>	
            </div>

            <div id="footer">

            </div>
        </div>

    </body>

</html>
