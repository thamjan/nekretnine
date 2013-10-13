<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

    <!-- Mirrored from kilab.pl/simpleadmin/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 21 Sep 2013 10:17:47 GMT -->
    <head>
        <?php include './include/head.php'; ?>
        <title>Logovanje</title>
    </head>
    <body>
        <div class="wrap">
            <div id="header">

            </div>

            <div id="content">

                <div id="main">


                    <div class="half_w half_left">
                        <div class="h_title">Logovanje</div>
                        <form action="logic/loging.php" method="post">
                            <div class="element">
                                <label for="txtUsername">Korisničko ime</label>
                                <input id="username" name="username" class="text err" />
                            </div>
                            <div class="element">
                                <label for="txtUsername">Lozinka</label>
                                <input id="password" name="password" type="password" class="text err" />
                            </div>
                            <div class="element">
                                <label id="errMsg" class="red"><?= (@$_SESSION['errMsg']) ?></label>
                            </div>
                            <div class="entry">
                                <button type="submit">Prijava</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>


        </div>

    </body>

    <!-- Mirrored from kilab.pl/simpleadmin/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 21 Sep 2013 10:17:48 GMT -->
</html>
