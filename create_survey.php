<?php $title = "Create Survey" ?>
<div id="survey-container">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <h3>Survey Title</h3>
        <input type="text" id="titlesurvey" name="questiontitle">

        <div id="questionsList">
        </div>

        <select name="createNew" id="createNew">
            <option value="text">Text</option>
            <option value="checkbox">Checkbox</option>
            <option value="radio">Multiple Choice</option>
        </select>
        <button id='newQuestion'>New Question</button>
        <br>



        <script>
            var i = 1;
            var $ = function (selector) {
                return document.querySelector(selector);
            }

            var type = {
                text: function () {
                    var html;
                    html = "<input type='text' name='question" + i + "' disabled='disabled'>";
                    return html;
                },
                checkbox: function () {
                    var html;
                    html = "<input type='checkbox' name='question" + i + "'>";
                    html += "<input type='text' name='question" + i + "' placeholder='Question'>";
                    html += '<button type="button" class="btn btn-primary">+</button>';
                    return html;
                }
            }
            $('#newQuestion').onclick = function () {
                var choice = document.getElementById('createNew').value;
                var title = document.createElement('div');
                title.innerHTML = "<input type='text' name='question" + i + "' placeholder='Question'>";
                $('#questionsList').appendChild(title);
                switch (choice) {
                    case "text":
                // var newQuestion = document.createElement('li');
                var option = document.createElement('div');
                // li.className = 'dynamic-link';
                option.innerHTML = type.text();

                // Append it and attach the event (via onclick)
                $('#questionsList').appendChild(option);
                // li.onclick = dynamicEvent;
                break;
                case "checkbox":
                // var newQuestion = document.createElement('li');
                var option = document.createElement('div');
                // li.className = 'dynamic-link';
                option.innerHTML = type.checkbox();

                // Append it and attach the event (via onclick)
                $('#questionsList').appendChild(option);
                // li.onclick = dynamicEvent;
                break;
            }
            i++;
            return false;
        };
    </script>

    <script>
        document.title = "<?php echo $title ?>";

    </script>
    <script src="Bootstrap-Form-Builder-gh-pages\assets\js\main.js">
    </script>