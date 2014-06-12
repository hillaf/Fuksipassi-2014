<body>
    <div class="container">


        <h1><?php echo htmlspecialchars($data->naytettavaFuksi->getNimi()); ?></h1>

        <br>



        <div class="form-horizontal">

            <form class="form-control-static" role="form">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nimi</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavaFuksi->getNimi()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Irc</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavaFuksi->getIrc()); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo htmlspecialchars($data->naytettavaFuksi->getEmail()); ?></p>
                    </div>
                </div>
            </form>
        </div>

        <br>

       
            <div class="form-group">
                <form class="form-group" role="form" method="POST" action="fuksinpoisto.php">
                    <input type="hidden" name="id" value="<?php echo $data->naytettavaFuksi->getId(); ?>">
                    <button type="submit" class="btn btn-default">Poista fuksi</button>
                </form>
            </div>
        


    </div>
</body>