@extends('layouts.admin')

@section('content')
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 700px; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Type de services et de formations</h2>
                <a href="{{route('formation.create')}}"> <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Ajouter une formation</button></a>
                <br>
                @if(count($array_type_formations) > 0)
                    @if(count($array_nbr_formations) > 0)
                        @if(count($array) > 0)

                    @for($i=0; $i < count($array_type_formations); $i++)
                            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $i }}">

                                            {{ $array_type_formations[$i] }} ( {{ $array_nbr_formations[$i] }} )
                                        </button>
                                    </h3>
                                    <!-- # CONTENT OF ACCORDEON-->
                                    <div id="faq-content-{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                        <div class="accordion-body">
                                            <!-- The Modal -->
                                            <div id="myModal" class="modal">
                                                <!-- Trigger/Open The Modal
                                                <button id="myBtn">Open Modal</button>-->
                                                <!-- Modal content -->
                                                <div class="modal-content">
                                                    <span class="close">&times;</span>
                                                    <p id="data"></p>
                                                </div>

                                            </div>
                                            <!-- The Modal2 -->
                                            <div id="myModal2" class="modal">
                                                <!-- Trigger/Open The Modal
                                                <button id="myBtn">Open Modal</button>-->
                                                <!-- Modal content -->
                                                <div class="modal-content">
                                                    <span class="close">&times;</span>
                                                    <p id="data2"></p>
                                                </div>

                                            </div>
                                    <?php

                                        $formation_id =  $array[$i];
                                        $nom = '';
                                        $id = 0;
                                        $nbr_places = 0;
                                        //echo $formation_id;
                                    $formations= DB::select(" SELECT * FROM `formations` WHERE formation_id= $formation_id ORDER BY nom_fr ASC;");

                                            echo "<ul style='list-style-type:none'>";
                                    foreach ($formations as $f){

                                        $nom = $f->nom_fr;
                                        $id = $f->id;
                                        $nbr_places = $f->nbr_places;

                                        $link  = '<iframe src="/admin/inscriptions_formations/{$id}/edit" name="page"></iframe>';
                                        $link2 = '<iframe id="myIframe" src="http://getprismatic.com/" onLoad="iframeDidLoad();"></iframe>';
                                        $link3 = '<iframe src={!! /admin/inscriptions_formations/{$id}/edit !!}>Your browser is not compatible</iframe>';

                                        //echo $link2;

                                        echo "<li style='padding-bottom: 15px;'>$nom ($nbr_places)
                                                    <a href='/admin/formation/{$id}/edit' class=''>modifier</a>&nbsp;

                                                     <a id='myBtn' styphple='color: #4154f1;' onClick='return doSomething($id)'>inscriptions</a>&nbsp;

                                                      <a  href='/#' class=''>présences</a>&nbsp;
                                                      <a  href='/#' class=''>fiche</a>&nbsp;

                                               </li>";

                                    }
                                        echo "</ul>";
                                    ?>

                                        </div>
                                    </div>
                                </div><!-- # Faq item-->

                            </div>

                    @endfor
                        @endif
                        @endif
                        @endif

                <script>


                    function doSomething(value)
                    {
                        var id= value;
                        var link= "admin/inscriptions_formations/";
                        console.log(id + link);

                        $.ajax({
                            type: "GET",
                            url: 'inscriptions_formations/'+id+'/edit',
                            //data: { 'id': id, 'link' : link},
                            //alert(link),
                            //success: function(data){
                                //alert(data);
                            //}
                            data: $(this).serialize()
                        }).then(
                            // resolve/success callback
                            function(response)
                            {
                                var jsonData = JSON.parse(response);

                                // user is logged in successfully in the back-end
                                // let's redirect
                                if (jsonData.success == "1")
                                {


                                                                 // Get the modal
                                   var modal = document.getElementById("myModal");

                                   // Get the button that opens the modal
                                   var btn = document.getElementById("myBtn");

                                   // Get the <span> element that closes the modal
                                   var span = document.getElementsByClassName("close")[0];

                                   // When the user clicks on the button, open the modal
                                   //btn.onclick = function() {
                                       modal.style.display = "block";
                                   //}

                                   // When the user clicks on <span> (x), close the modal
                                   span.onclick = function() {
                                       modal.style.display = "none";
                                   }

                                   // When the user clicks anywhere outside of the modal, close it
                                   window.onclick = function(event) {
                                       if (event.target == modal) {
                                           modal.style.display = "none";
                                       }

                                   }

                                    console.log(jsonData.data);
                                    console.log(jsonData.data.length);

                                    var arr = jsonData.data;
                                    var holder = document.getElementById("data");
                                   // holder.innerHTML += "<form action=\"/action_page.php\">;
                                    //print array in the data holder
                                    for(var i=0; i < arr.length; i++)

                                        //holder.innerHTML += "<p>"+arr[i].nom+"  "+arr[i].prenom+"  "+"<a href=inscriptions_formations/"+id+"/edit target=\"_blank\">Modifier</a></p><br>";
                                        holder.innerHTML += "<p>"+arr[i].nom+"  "+arr[i].prenom+"  "+"<a  onclick=showProperty('inscriptions_formations/"+arr[i].id+"/"+arr[i].courriel+"/edit_list_formation');test("+arr[i].nom+'-'+arr[i].prenom+") >Modifier</a></p><br>";

                                        holder.innerHTML += "<input value="+arr[i].nom+'-'+arr[i].prenom+"> <input type='submit' value='Modifier'> <br>"

                                        //console.log('current id'+ id);


                                }
                                else
                                {
                                    alert('Invalid Credentials!');
                                }
                            },
                             //rejectfailure callback
                            function()
                            {
                                alert('There was some error!');
                            }
                        );
                        //return confirm('Do you really want to follow this link?')
                    }
                    var name ='';
                    var user_id = '';

                    function showProperty(linkTarget){

                        var propertyWidth= 600;
                        var propertyHeight=600;
                        var winLeft = (screen.width-propertyWidth)/2;
                        var winTop = (screen.height-propertyHeight)/2;
                        var winOptions= "toolbar=no, menubar=no, location=no, scrollbars=yes,resizable=no";

                        winOptions += ",width="+ propertyWidth;
                        winOptions += ",height="+ propertyHeight;
                        winOptions += ",left=" + winLeft;
                        winOptions += ",top=" + winTop;
                        propertyWindow= window.open(linkTarget, "propertyInfo", winOptions);
                        propertyWindow.focus();
                    }


                    function test(name, id){


                        //alert(name,id);
                        // Get the modal
                        var modal2 = document.getElementById("myModal2");

                        // Get the button that opens the modal
                        var btn = document.getElementById("myBtn");

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[1];

                        // When the user clicks on the button, open the modal
                        //btn.onclick = function() {
                        modal2.style.display = "block";
                        //}

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                            modal2.style.display = "none";
                        }

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                            if (event.target == modal2) {
                                modal2.style.display = "none";
                            }

                        }
                    }

                </script>

            </div>
        </div>
    </div>
@endsection
