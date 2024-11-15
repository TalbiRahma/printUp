<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="ui grid">
        <div class="four wide column">
            <div class="ui fluid accordion">
                <div class="title">
                    <i class="dropdown icon"></i>
                    <i class="icon setting"></i>
                    Settings
                </div>
                <div class="content">
                    <a href="#" id="resetButton">
                        <div class="ui button">
                            <i class="refresh icon"></i>
                            Reset
                        </div>
                    </a>
                    <p>You can choose to add unlimited fext or Image below.</p>
                </div>
                <div class="title">
                    <i class="dropdown icon"></i>
                    <i class="font icon"></i>
                    Add Text
                </div>
                <div class="content">
                    <div class="ui form">
                        <div class="field">
                            <label>Text:</label>
                            <div class="ui left labeled input">
                                <input placeholder="Text" type="text" id="inputText">
                            </div>
                        </div>

                        <div class="field">
                            <label>Font</label>
                            <div class="ui selection dropdown fluid">
                                <input name="gender" type="hidden" id="inputFont" value="Arial">
                                <div class="default text">Arial</div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="Arial">Arial</div>
                                    <div class="item" data-value="Impact">Impact</div>
                                    <div class="item" data-value="Lobster">Lobster</div>
                                    <div class="item" data-value="Indie Flower">Indie Flower</div>
                                    <div class="item" data-value="Gloria Hallelujah">Gloria Hallelujah</div>
                                </div>
                            </div>
                        </div>

                        <!--<div class="field">
                  <label>Size</label>
                  <input placeholder="14" value="14" type="text" id="inputSize">
                </div>-->

                        <div class="field">
                            <label>Color</label>
                            <div class="ui selection dropdown fluid">
                                <input name="color" type="hidden" id="inputColor" value="red">
                                <div class="default text">Red</div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="black">Black</div>
                                    <div class="item" data-value="white">White</div>
                                    <div class="item" data-value="red">Red</div>
                                    <div class="item" data-value="orange">Orange</div>
                                    <div class="item" data-value="blue">Blue</div>
                                    <div class="item" data-value="green">Green</div>
                                    <div class="item" data-value="aqua">Aqua</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" id="addTextButton">
                            <div class="ui orange button">
                                <i class="add sign icon"></i>
                                Add Text
                            </div>
                        </a>
                    </div><!-- form -->
                </div>
                <div class="title">
                    <i class="dropdown icon"></i>
                    <i class="icon photo"></i>
                    Add Image
                </div>
                <div class="content">
                    <a href="#" id="libraryButton">
                        <div class="ui orange button">
                            <i class="block layout icon"></i>
                            from Library
                        </div>
                    </a>
                    <p>OR</p>
                    <input type="file" id="imgLoader" class="imgLoader" />
                    <label for="imgLoader">
                        <div class="ui orange button">
                            <i class="upload disk icon"></i>
                            Upload Image
                        </div>
                    </label>
                    <p>Supported files: JPG, JPEG, PNG</p>
                </div>
            </div>
        </div>
        <div class="eight wide column">
            <div class="canvas">
                <canvas id="c" width="450" height="700"></canvas>
            </div>
        </div>
        <div class="four wide column">

            <div id="boxEdit">
                <div class="ui top tertiary inverted attached segment">
                    <p>EDIT</p>
                </div>
                <div class="ui bottom attached segment">
                    <p>Select object to edit or Add new object from left menu.</p>
                </div>
            </div><!-- .boxEditImage -->

            <div id="boxEditText">
                <div class="ui top orange inverted attached segment">
                    <p>EDIT : Text</p>
                </div>
                <div class="ui bottom attached segment">
                    <div class="ui form">
                        <div class="field">
                            <label>Text:</label>
                            <div class="ui left labeled input">
                                <input placeholder="Text" type="text" id="editText">
                            </div>
                        </div>

                        <div class="field">
                            <label>Font</label>
                            <div class="ui selection dropdown fluid" id="uiEditFont">
                                <input name="gender" type="hidden" id="editFont">
                                <div class="default text">select</div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="Arial">Arial</div>
                                    <div class="item" data-value="Impact">Impact</div>
                                    <div class="item" data-value="Lobster">Lobster</div>
                                    <div class="item" data-value="Indie Flower">Indie Flower</div>
                                    <div class="item" data-value="Gloria Hallelujah">Gloria Hallelujah</div>
                                </div>
                            </div>
                        </div>

                        <!--<div class="field">
                    <label>Size</label>
                    <input placeholder="14" value="14" type="text" id="editSize">
                  </div>-->

                        <div class="field">
                            <label>Color</label>
                            <div class="ui selection dropdown fluid" id="uiEditColor">
                                <input name="gender" type="hidden" id="editColor">
                                <div class="default text">Red</div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="black">Black</div>
                                    <div class="item" data-value="white">White</div>
                                    <div class="item" data-value="red">Red</div>
                                    <div class="item" data-value="orange">Orange</div>
                                    <div class="item" data-value="blue">Blue</div>
                                    <div class="item" data-value="green">Green</div>
                                    <div class="item" data-value="aqua">Aqua</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" id="updateTextButton">
                            <div class="ui orange button">
                                <i class="checkmark icon"></i>
                                Update
                            </div>
                        </a>
                        <a href="#" class="trashButton">
                            <div class="ui icon button black">
                                <i class="trash icon"></i>
                            </div>
                        </a>
                    </div><!-- form -->
                </div>
            </div><!-- .boxEditText -->

            <div id="boxEditImage">
                <div class="ui top orange inverted attached segment">
                    <p>EDIT : Image</p>
                </div>
                <div class="ui bottom attached segment">
                    <p>Use rectangle control around image to move / scale / rotate.</p>
                    <a href="#" class="trashButton">
                        <div class="ui icon button black">
                            <i class="trash icon"></i>
                        </div>
                    </a>
                </div>
            </div><!-- .boxEditImage -->

            <div class="ui segment pricebox">
                <strong>Price:</strong> <span id="price">--</span> Baht
            </div>

            <div class="ui segment pricebox">
                <a href="#" id="getdata-button">
                    <div class="ui orange button">Get JSON</div>
                </a>
            </div>
        </div>
    </div>

    <div class="library ui modal">
        <i class="close icon"></i>
        <div class="header">
            Choose our high-quality image to add
        </div>
        <div class="content">
            <div class="librarylist">
                <div class="ui five connected items">
                    <div class="item" data-price="-50">
                        <div class="ui left corner label">
                            <div class="text">-50</div>
                        </div>
                        <div class="image">
                            <img src="https://blog.spoongraphics.co.uk/wp-content/uploads/2010/badge/chrisspooner-emblem.png"
                                alt="" />
                        </div>
                    </div>
                    <div class="item" data-price="-30">
                        <div class="ui left corner label">
                            <div class="text">-30</div>
                        </div>
                        <div class="image">
                            <img src="http://static.freepik.com/free-photo/tribal-star-shape-vector_91-3339.jpg"
                                alt="" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="image">
                            <img src="http://cdn.vectorstock.com/i/composite/26,74/apple-shape-vector-752674.jpg"
                                alt="" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="image">
                            <img src="http://static.freepik.com/free-photo/tribal-star-shape-vector_91-3339.jpg"
                                alt="" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="image">
                            <img src="https://blog.spoongraphics.co.uk/wp-content/uploads/2010/badge/chrisspooner-emblem.png"
                                alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui button orange" id="libAddButton">
                Add Image
            </div>
            <div class="ui button">
                Cancel
            </div>
        </div>
    </div>

    <div class="ui small modal" id="modalDelete">
        <i class="close icon"></i>
        <div class="header">
            Remove Object
        </div>
        <div class="content">
            <p>Are you sure you want to remove this object?</p>
        </div>
        <div class="actions">
            <div class="ui negative labeled button">
                Cancel
            </div>
            <div class="ui positive right labeled button">
                Delete !
            </div>
        </div>
    </div>

    <div class="changelog">
        <h2>Change Log</h2>
        <ul>
            <li>05/09/2014 - Reset button</li>
            <li>03/09/2014 - Remove Text / Image, Edit & Update Text, Validate Text, Validate image Uploaded (JPG and
                PNG only), Item List Array Added / Remove</li>
            <li>25/08/2014 - Edit Text (Not updatable yet)</li>
            <li>20/08/2014 - Add Text / Add Text using Google Font / Dynamic Price when select image from library</li>
            <li>18/08/2014 - Add custom image upload / pricebox (not working yet) / Add image from library / Show price
                in library</li>
            <li>17/08/2014 - Create layout</li>
        </ul>

        <h2>Todos</h2>
        <ul>
            <li>* Remove font size from 'Add Text'</li>
            <li>* Update price when remove object</li>
            <li>* Export to image / JSON</li>
            <li>* Find better template picture</li>
            <li>* Error when out of printable area</li>

            <li>Loading progress when load image</li>
            <li>Better error box than alert</li>
        </ul>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/fabric.js/1.4.8/fabric.min.js"></script>
    <script>
        var select_item = '';
        var select_price = '+0';
        var price = 299;

        var item_list = [];

        var rectboxX = 130,
            rectboxY = 352,
            rectboxWidth = 215,
            rectboxHeight = 337;

        function updatePrice(price_change) {
            var regExp = /(\=|\+|\-)(\d+)/;
            var result, result_sign, result_no;

            /* Use Regular Expression to decide input
               undefined = no change
               '=50' = equal 50 baht
               '+50' = add 50 baht
               '-50' = decrease 50 baht
            */
            if ((result = regExp.exec(price_change)) != null) {
                if (result.index === regExp.lastIndex) {
                    regExp.lastIndex++;
                }
                result_sign = result[1];
                result_no = result[2];
            }

            if (!result_no) {

            } else if (result_sign == '=') {
                price = price_change;
            } else if (result_sign == '+') {
                price += price_change;
            } else if (result_sign == '-') {
                price -= price_change
            }

            /* Update Price */
            $('#price').html(price);
        }

        $(document).ready(function() {
            updatePrice();

            $('#boxEdit').show();
            $('#boxEditText, #boxEditImage').hide();

            $('.ui.accordion')
                .accordion();

            $('.ui.dropdown')
                .dropdown();

            $('#libraryButton').on('click', function() {
                select_item = '';
                $('.library.modal')
                    .modal('show');
            });

            $('.library').find('.item').on('click', function() {
                $('.item').removeClass('active');
                select_item = $(this).find('img').attr('src');
                select_price = $(this).attr('data-price');
                $(this).addClass('active');
            });

            $('#libAddButton').on('click', function() {
                if (select_item === '') return;
                var imgObj = new Image();
                imgObj.src = select_item;
                imgObj.onload = function() {
                    // start fabricJS stuff

                    var image = new fabric.Image(imgObj);
                    image.scale(0.5).set({
                        left: 0,
                        right: 0
                    });
                    //image.scale(getRandomNum(0.1, 0.25)).setCoords();

                    image.on('selected', function() {
                        var obJ = canvas.getActiveObject();

                        $('#boxEdit, #boxEditText').hide();
                        $('#boxEditImage').show();
                    });

                    image.itemPrice = select_price;

                    item_list.push(image);
                    canvas.setActiveObject(image).add(image);

                    // end fabricJS stuff

                    updatePrice(select_price);
                }
            });

            var canvas = this.__canvas = new fabric.Canvas('c');
            fabric.Object.prototype.transparentCorners = false;

            var radius = 300;

            fabric.Image.fromURL('https://i.imgur.com/1VNvSnK.png', function(img) {
                img.set({
                    left: 0,
                    top: 0,
                    selectable: false,
                    hasControls: false,
                    hasBorders: false
                });
                canvas.add(img).setActiveObject(img);

                rectbox = new fabric.Rect({
                    width: rectboxWidth,
                    height: rectboxHeight,
                    left: rectboxX,
                    top: rectboxY,
                    stroke: 'rgba(0,0,0,0.3)',
                    strokeWidth: 2,
                    fill: 'rgba(0,0,0,0)',
                    selectable: false,
                    hasControls: false,
                    hasBorders: false
                });

                canvas.add(rectbox);

                var recttext = new fabric.Text('Printable Area', {
                    fontSize: 14,
                    fontFamily: 'sans-serif',
                    left: 200,
                    top: 330,
                    fill: 'rgba(0,0,0,0.3)',
                    selectable: false,
                    hasControls: false,
                    hasBorders: false
                });

                canvas.add(recttext);

                // Create Clip Area (Object created after this will be clipped)
                /*    var ctx = canvas.getContext("2d");
                    ctx.beginPath();
                    ctx.rect(rectboxX, rectboxY,rectboxWidth, rectboxHeight);
                    ctx.closePath();
                    ctx.lineWidth = 2;
                    ctx.strokeStyle = 'rgba(0, 0, 0, 0)';
                    ctx.stroke();
                    ctx.clip();*/
                // END Clip Area
            });

            $('#addTextButton').on('click', function() {
                var inText = $('#inputText').val();

                if (inText.trim() === '') {
                    alert('Please type text');
                    return;
                }

                var inFont = $('#inputFont').val();
                var inSize = 14;
                var inColor = $('#inputColor').val();

                var newText = new fabric.Text(inText, {
                    fontSize: inSize,
                    fontFamily: inFont,
                    fill: inColor
                });

                newText.on('selected', function() {
                    var obJ = canvas.getActiveObject();

                    // Update Edit Text
                    $('#editText').val(obJ.text);
                    $('#uiEditFont').dropdown('set selected', obJ.fontFamily);
                    $('#uiEditFont').dropdown('set value', obJ.fontFamily);
                    $('#uiEditColor').dropdown('set selected', obJ.fill);
                    $('#uiEditColor').dropdown('set value', obJ.fill);

                    $('#boxEdit, #boxEditImage').hide();
                    $('#boxEditText').show();
                });

                canvas.setActiveObject(newText).add(newText);

                item_list.push(newText);
            });

            $('#updateTextButton').on('click', function() {
                var inText = $('#editText').val();

                if (inText.trim() === '') {
                    $('.trashButton').trigger('click');
                    return;
                }

                var inFont = $('#editFont').val();
                var inSize = 14;
                var inColor = $('#editColor').val();

                var TexttoEdit = canvas.getActiveObject();
                TexttoEdit.setText(inText)
                    .setFontFamily(inFont)
                    .setFontSize(inSize)
                    .setFill(inColor);

                canvas.renderAll();
            });

            document.getElementById('imgLoader').onchange = function handleImage(e) {

                // Check for available file
                if ($('#imgLoader').val().length < 1) {
                    // No file Uploaded
                    console.log('No file uploaded');
                    return false;
                }

                // Check file extensions
                var fileExt = $('#imgLoader').val().split('.').pop().toLowerCase();
                if ($.inArray(fileExt, ['png', 'jpg', 'jpeg']) == -1) {
                    alert('You cannot upload this file. Please upload only .png, .jpg, or .jpeg images.');
                    $('#file').val("");
                    return false;
                }

                var reader = new FileReader();
                reader.onload = function(event) {
                    var imgObj = new Image();
                    imgObj.src = event.target.result;
                    imgObj.onload = function() {
                        // start fabricJS stuff

                        var image = new fabric.Image(imgObj);
                        image.set({
                            left: 0,
                            right: 0
                        });

                        image.on('selected', function() {
                            var obJ = canvas.getActiveObject();

                            $('#boxEdit, #boxEditText').hide();
                            $('#boxEditImage').show();
                        });

                        //image.scale(getRandomNum(0.1, 0.25)).setCoords();
                        canvas.setActiveObject(image).add(image);

                        item_list.push(image);

                        // end fabricJS stuff
                    }

                }
                reader.readAsDataURL(e.target.files[0]);
            }

            $('.trashButton').on('click', function() {
                $('#modalDelete').modal('setting', {
                    onDeny: function() {},
                    onApprove: function() {
                        var obJ = canvas.getActiveObject();

                        // Remove from item_list
                        var obJindex = item_list.indexOf(obJ);
                        if (obJindex > -1) {
                            item_list.splice(obJindex, 1);
                        }

                        // Remove from canvas
                        obJ.remove();
                        clearSelection();
                    }
                }).modal('show');

                return false;
            });

            $('#resetButton').on('click', function() {
                var iLength = item_list.length;
                for (var i = 0; i < iLength; i++) {
                    canvas.remove(item_list[i]);
                }
                item_list = [];
            });

            canvas.on('selection:cleared', function() {
                clearSelection();
            });

            function clearSelection() {
                $('#boxEditImage, #boxEditText').hide();
                $('#boxEdit').show();
            }

            $('#getdata-button').on('click', function() {
                alert(JSON.stringify(item_list));
                for (i = 0; i < item_list.length; i++) {
                    var one_item = item_list[i];
                    console.log(one_item, one_item.getLeft(), one_item.getTop());
                }
                body {
                    font - family: sans - serif;
                }

                .imgLoader {
                    display: none;
                    opacity: 0!important;
                }

                .pricebox {
                    span {
                        font - size: 30 px;
                        color: orange;
                    }
                }

                .ui.items.item.active {
                    border: 3 px solid red;
                }

            });

        });
    </script>
    <style>

body {
  font-family: sans-serif;
}

.imgLoader {
  display: none;
  opacity: 0 !important;
}

.pricebox {
  span {
    font-size: 30px;
    color: orange;
  }
}

.ui.items .item.active {
  border: 3px solid red;
}

    </style>
</body>

</html>
