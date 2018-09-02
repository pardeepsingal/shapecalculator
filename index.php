<?php
/**
 * Created by PhpStorm.
 * User: Pardeep K. Singhal
 * Email: pardeepsingal1@gmail.com
 * Date: 25/8/18
 * Time: 3:06 PM
 */
$shapes = array('rectangle' => 'Rectangle', 'circle' => 'Circle', 'square' => 'Square', 'ellipse' => 'Ellipse');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

    </style>
    <title>Welcome in Shape Calculator App</title>

    <!-- Bootstrap -->
    <link href="includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/css/custom.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <div class="container">
        <div class="container-header">
            <img src="includes/images/header_bg.gif" border="0" width="100%"/>
            <div class="bottom-left"><a href="#">Shape Calculator</a></div>
        </div>

        <div class="row mt-50">
            <div class="col-md-6">
                <h4>Welcome to Shape Calculator</h4>

                <p class="text-left">Shape Calculator is an interactive web application. To the right you will
                    find the 3 step application. Follow the instructions in each step.
                    Clicking cancel will take you back to step 1. Enjoy!</p>

                <p class="text-left">A small river named Duden flows by their place and supplies it with the
                    necessary regelialia. It is a paradisematic country, in which roasted parts of
                    sentences fly into your mouth.</p>

                <p class="text-left">Even the all-powerful Pointing has no control about the blind texts it is an
                    almost unorthographic life One day however a small line of blind text by the
                    name of Lorem Ipsum decided to leave for the far World of Grammar. The
                    Big Oxmox advised her not to do so, because there were thousands of bad
                    Commas.</p>
            </div>
            <div class="col-md-4"><input type="hidden" id="currentStep" value=1/>
                <div class="well" id="step1">
                    <h4>Step 1: Select your shape</h4>
                    <p>Please select the shape that you would like to calculate the area of and press the <br/>button
                        "Go to step 2"</p>
                    <?php
                    if (isset($shapes) && count($shapes) > 0) {
                        foreach ($shapes as $key => $shape) {
                            echo ' <div class="radio">
                                  <label><input type="radio" name="shape" value="' . $key . '" />' . $shape . '</label>
                              </div>';
                        }
                    }
                    ?>

                </div>

                <div class="well hide" id="step2">
                    <h4>Step 2: Insert your values</h4>
                    <p>You have selected a <span class="shape"></span>, please input <br/>the required variables.</p>
                    <div id="formBox"></div>
                </div>

                <div class="well hide" id="step3">
                    <h4>Step 3 : Your results</h4>
                    <p>You have calculated the area of a <span class="shape"></span> <br/> with a <span
                                class="reqParams"></span>. <br/>Below is your result:</p>
                    <div id="result" class="fnt-result"></div>
                </div>

                <div class="btnsteps hide">
                    <button type="button" id="nextStep">Go to step2</button>
                    <span class="cancelAction hide"> or <a href="javascript:void(0)" class="cancelBtn">Cancel</a></span>
                </div>

            </div>
            <div class="col-md-2">
                <a href="https://placeholder.com"><img src="https://via.placeholder.com/120x240" border="0"
                                                       class="pull-right"></a>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="./includes/js/bootstrap.min.js"></script>
<script>
    /* if user choose any Shape then Next Step Button Active */
    $("input[name='shape']").change(function () {
        $('.btnsteps').removeClass('hide');
    });

    /* If user click on next button */
    $('#nextStep').click(function () {

        // get the selected Shape value
        var selectedShape = $("input[name='shape']:checked").val();

        // current step
        var currentStep = parseInt($('#currentStep').val());

        // as we know we have final result on step3 so we store that in constant
        const finalStep = 3;

        if (currentStep == finalStep) // if we are on final step then user should move after that on first step (Start Over section)
        {
            var nextStep = 1;

        } else if (currentStep == 2) {
            if (selectedShape == 'circle') {
                var diameter = $('#diameter').val();
                var radius = diameter/2;
                var result = Math.PI * radius * radius;
                $('.reqParams').text('diameter of ' + diameter);
                $('#result').text('The Area is ' + result.toFixed(2));
            }
            if (selectedShape == 'rectangle') {
                var height = $('#height').val();
                var width = $('#width').val();
                var result = height * width;
                $('.reqParams').text('width of ' + width + ' and height of ' + height);
                $('#result').text('The Area is ' + result.toFixed(2));
            }
            if (selectedShape == 'square') {
                var width = $('#width').val();
                var result = width * width;
                $('.reqParams').text('Width of ' + a);
                $('#result').text('The Area is ' + result.toFixed(2));
            }
            if (selectedShape == 'ellipse') {
                var width = $('#width').val();
                var height = $('#height').val();
                var result = Math.PI * width * height;
                $('.reqParams').text('width of ' + width + ' and height of ' + height);
                $('#result').text('The Area is ' + result.toFixed(2));
            }
            var nextStep = currentStep + 1;
        } else {
            var nextStep = currentStep + 1;
        }
        $('#currentStep').val(nextStep);
        var nextClass = '#step' + nextStep;
        var currentClass = '#step' + currentStep;
        $(currentClass).addClass('hide');
        $(nextClass).removeClass('hide');
        $('.shape').text(selectedShape);
        var fieldStr;
        if (selectedShape == 'circle') {
            fieldStr = "<div class=\"form-inline form-group\">\n" +
                "    <label for=\"diameter\">Diameter: </label>\n" +
                "    <input type=\"text\" class=\"form-control\" id=\"diameter\" style=\"width:30%\" >\n" +
                "  </div>\n";
        }
        if (selectedShape == 'rectangle') {
            fieldStr = "<div class=\"form-inline form-group\">\n" +
                "    <label for=\"width\">Width: </label>\n" +
                "    <input type=\"text\" class=\"form-control\" id=\"width\" style=\"width:30%\" >\n" +
                "  </div>\n";

            fieldStr += "<div class=\"form-inline form-group\">\n" +
                "    <label for=\"length\">Height: </label>\n" +
                "    <input type=\"text\" class=\"form-control\" id=\"height\" style=\"width:30%\" >\n" +
                "  </div>\n";

        }
        if (selectedShape == 'square') {
            fieldStr = "<div class=\"form-inline form-group\">\n" +
                "    <label for=\"diameter\">Width: </label>\n" +
                "    <input type=\"text\" class=\"form-control\" id=\"width\" style=\"width:30%\" >\n" +
                "  </div>\n";
        }
        if (selectedShape == 'ellipse') {
            fieldStr = "<div class=\"form-inline form-group\">\n" +
                "    <label for=\"diameter\">Width: </label>\n" +
                "    <input type=\"text\" class=\"form-control\" id=\"width\" style=\"width:30%\" >\n" +
                "  </div>\n";
            fieldStr += "<div class=\"form-inline form-group\">\n" +
                "    <label for=\"diameter\">Height: </label>\n" +
                "    <input type=\"text\" class=\"form-control\" id=\"height\" style=\"width:30%\" >\n" +
                "  </div>\n";
        }
        if (nextStep == 3) {
            $(".btnsteps #nextStep").text('Start Over');
        } else {
            $(".btnsteps #nextStep").text('Go to step ' + (nextStep + 1));
        }

        $('#formBox').html(fieldStr);
    });

</script>
</body>
</html>