<?php 
include_once "Db.php";
session_start();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>GuestBook</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="/css/main.css">
    </head>

    <body>
       
        <div class="container-fluid background">
            <div class="row textrow logo head">
               <div class="col-md-12 head">
                </div>
                <div class="col-md-10">
                            <div>
                               <?php
                                $db = Db::getInstance();
                                $link = $db->getConnect();
                                $result = $link->query("SELECT * FROM guestBook");
                                $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                if(is_array($items)){ ?>
                                <table class="table table-hover table-bordered display" id="myTable" data-page-length='3'> 
                                    <thead>
                                        <tr>
                                            <th class="col-md-2">UserName</th>
                                            <th class="col-md-2">E-mail</th>
                                            <th class="col-md-6">Message</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($items as $text){ ?>
                                        <tr>
                                            <td>
                                                <?php echo $text['userName'];?>
                                                    <br>URL :
                                                    <?php echo $text['url'];?>
                                            </td>
                                            <td>
                                                    <?php echo $text['email'];?>
                                            </td>
                                            <td>
                                                    <?php $path = $_SERVER['DOCUMENT_ROOT'];
                                                    $imageName = $text['email'];
                                                    $image = $path."/img/".$imageName.".jpg"; 
                                                    if(file_exists($image)) {
                                                        echo "<img src='/img/".$imageName.".jpg'" ;
                                                    }?>
                                                    <br>
                                                    <?php echo $text['text']; ?>
                                            </td>
                                            <td>
                                                    <?php echo $text['time']; ?>
                                            </td>
                                        </tr>
                                        <?php } } ?>
                                </table>
                            </div>
                </div>
                <div class="col-md-2">
                    <form id="form" method="post" enctype="multipart/form-data">
                        <p>User Name:*</p>
                        <p>
                            <input type="text" id="name" name="userName" class="name form-control" value="" required/>
                        </p>
                        <p>E-mail*</p>
                        <p>
                            <input type="email" id="email" class="email form-control" value="" required/>
                        </p>
                        <p>Homepage</p>
                        <p>
                            <input type="url" id="url" class="url form-control" value="" />
                        </p>
                        <p>Text*</p>
                        <p>
                            <textarea id="message" class="message form-control" name="text" required></textarea>
                        </p>
                        <p>Download image</p>
                        <p>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                <div>
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                    <input type="file" name="file" id="file" class="file" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </p>
                        <p> * - required section</p>
                        <p>
                            <button type="button" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-success" value="send" name="send">Send</button>
                        </p>
                    </form>
                    <div id="results">
                    </div>
                </div>
        </div>
       <script src="/js/ajax.js"></script>
       
    </body>

    </html>