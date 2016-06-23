var canvas;
var context;
var isDrawing = false;
var clear_part;
var colorBlack = "#000";
var colorWhite = "#fff";


window.onload = function () {
    
    if ($('#canvasCreate')[0]) {
        
        canvas = document.getElementById("canvasCreate");
        context = canvas.getContext("2d");

        // Подключаем требуемые для рисования события
        canvas.onmousedown = startDrawing;
        canvas.onmouseup = stopDrawing;
        canvas.onmouseout = stopDrawing;
        canvas.onmousemove = draw;


        clear_part = document.getElementById("clear_part");
        clear_part.onclick = eraser;

        black_color = document.getElementById("black-color");
        black_color.onclick = blackColor;

        save_canvas = document.getElementById("save_canvas");
        save_canvas.onclick = saveCanvas;

        // Если рисунок редактируется, вставляем имеющийся рисунок в холст
        if ($('#canvas-data').html()) {
            var img = new Image();

            img.src = $('#canvas-data').html();

            img.onload = function(){
                context.drawImage(img, 0, 0);
            };
        }
        
        // Изменение визуального состояния кнопок
        $('.btn-xs').click(function () {
            $('.btn-xs').removeClass('active');
            $(this).addClass('active');
        });
        
    }
    
};


function startDrawing(e) {
    // Начинаем рисовать
    isDrawing = true;

    // Создаем новый путь (с текущим цветом и толщиной линии) 
    context.beginPath();

    // Нажатием левой кнопки мыши помещаем "кисть" на холст
    context.moveTo(e.pageX - canvas.offsetLeft, e.pageY - canvas.offsetTop);
}


function stopDrawing() {
    isDrawing = false;
}


function draw(e) {
    if (isDrawing === true)
    {
        // Определяем текущие координаты указателя мыши
        var x = e.pageX - canvas.offsetLeft;
        var y = e.pageY - canvas.offsetTop;

        // Рисуем линию до новой координаты
        context.lineTo(x, y);
        context.stroke();
    }
}


//***********Очистить холст***********
function clearCanvas() {
    context.clearRect(0, 0, canvas.width, canvas.height);
}


//***********Ластик***********
function eraser() {
    context.strokeStyle = colorWhite;
}


//***********Перо***********
function blackColor() {
    context.strokeStyle = colorBlack;
}


//***********Сохранение рисунка***********
function saveCanvas() {
    
    var dataUrl = canvas.toDataURL();
    var password = $('#password').val();
    var id;
    var url = '/bitrix/components/brainkit/draw/ajax/draw-add.php';
    
    if ($('#canvas-data').attr("data-id")) {
        id = $('#canvas-data').attr("data-id");
        url = '/bitrix/components/brainkit/draw/ajax/draw-edit.php';
    }
    
    console.log(id);
    
    $.ajax({
            type: "POST",
            url: url,
            data: {
                    image: dataUrl,
                    password: password,
                    id: id
            }
    })
            .success(function (respond) {
            $('.alert').addClass('alert-success').html('Рисунок успешно сохранен');
    })
            .fail(function (respond) {
            $('.alert').addClass('alert-danger').html('Операция не удалась');
    });
}


