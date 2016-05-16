<?php 
include_once "db.php";
session_start();
//if(!empty($_SESSION['userdata'])){
//    $nameuser = implode("",$_SESSION['userdata']);
//    echo "Hello user $nameuser";
// }else{
//    echo "Hello, guest!";
//}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>GuestBook</title>
        <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

        <script type="text/javascript" src="jquery.validate.min.js"></script>
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
<!--        <img alt="Brand" class="head" src="/forsam/img/oso_guestbook-header.jpg">-->
        <div class="container-fluid">
            <div class="row textrow">
                <div class="col-md-9">
                    <ul class="list-group">
                        <li class="list-group-item textentry">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-md-3">UserName</th>
                                            <th class="col-md-8">Message: </th>
                                            <th>Date: </th>
                                        </tr>
                                    </thead>
                                    <?php 
                        $popage = 5;
                        if(isset($_GET['page'])){
                            $thispage = intval($_GET['page']);
                            if($thispage > 1){
                                $start =$thispage*$popage-$popage+1;
                            }else{
                                $start = 0;
                            }
                        }else{
                            $start = 0;
                        }
                        $db = db::getInstance();
                        $link = $db->getConnect();
                        $result = $link->query("SELECT * FROM guestBook LIMIT $start, $popage");
                        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        if(is_array($items)){
                            foreach($items as $text){ ?>
                                        <tr>
                                            <td>
                                                <?php echo $text['userName'];?>
                                                    <br>E-mail :
                                                    <?php echo $text['email'];?>
                                                        <br>URL :
                                                        <?php echo $text['url'];?>
                                            </td>
                                            <td>
                                                <?php echo $text['text']; ?>
                                            </td>
                                            <td>
                                                <?php echo $text['time']; ?>
                                            </td>
                                        </tr>
                                        <?php } } ?>
                                </table>
                            </div>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pagination pagination-lg ">
                                <?php  
                        $q= mysqli_query($link,"SELECT count(id) FROM guestBook");
                        $numberposts = mysqli_fetch_row($q);
                        $page_count = $numberposts[0]/$popage;
                        for($i=1;$i<=$page_count;$i++){
                        echo "<li class='page-item'><a class='page-link' href='http://forsam/forsam/index.php?page=$i'>$i</a></li>";
                        }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

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
        </div>
        <script src="ajax.js"></script>
    </body>

    </html>