<div class="head-nav">
    <a style="font-size: 20px;" href="<?php echo e(url('/')); ?>">< Back</a>
    <h2 style="margin: 0px 15px;">Todo List</h2>
</div>

<style>
    .head-nav {
        display: flex;
    }

    .create-task {
        padding-bottom: 20px;
    }

    .list-task {
        padding-bottom: 20px;
        max-width: 480px;
    }

    .container {
        display: flex;
    }

    .btn-container {
        padding-left: 10px;
    }

    .delete {
        color: red;
    }

    /* Include the padding and border in an element's total width and height */
    * {
        box-sizing: border-box;
    }

    /* Remove margins and padding from the list */
    ul {
        margin: 0;
        padding: 0;
    }

    /* Style the list items */
    ul li {
        cursor: pointer;
        position: relative;
        padding: 12px 8px 12px 40px;
        background: #eee;
        font-size: 18px;
        transition: 0.2s;

        /* make the list items unselectable */
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Set all odd list items to a different color (zebra-stripes) */
    ul li:nth-child(odd) {
        background: #f9f9f9;
    }

    /* Darker background-color on hover */
    ul li:hover {
        background: #ddd;
    }

    /* When clicked on, add a background color and strike out text */
    ul li.checked {
        background: #888;
        color: #fff;
        text-decoration: line-through;
    }

    /* Add a "checked" mark when clicked on */
    ul li.checked::before {
        content: '';
        position: absolute;
        border-color: #fff;
        border-style: solid;
        border-width: 0 2px 2px 0;
        top: 10px;
        left: 16px;
        transform: rotate(45deg);
        height: 15px;
        width: 7px;
    }

    /* Style the close button */
    .close {
        position: absolute;
        right: 0;
        top: 0;
        padding: 12px 16px 12px 16px;
    }

    .close:hover {
        background-color: #f44336;
        color: white;
    }

    /* Style the header */
    .header {
        background-color: green;
        padding: 1px 20px;
        color: white;
        text-align: center;
    }

    /* Clear floats after the header */
    .header:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Style the input */
    input {
        margin: 0;
        border: none;
        border-radius: 0;
        width: 75%;
        padding: 10px;
        float: left;
        font-size: 16px;
    }

    /* Style the "Add" button */
    .addBtn {
        padding: 10px;
        width: 25%;
        background: #d9d9d9;
        color: #555;
        float: left;
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 0;
    }

    .addBtn:hover {
        background-color: #bbb;
    }
</style>


<div class="list-task">
    <div id="myDIV" class="header">
        <h2>Your List of Tasks</h2>
    </div>

    <ul id="myUL">
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($task); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- <li>Pergi gim</li>
        <li class="checked">Bayar bill</li>
        <li>Beli nasi</li>
        <li>Makan bubur</li>
        <li>Solat dhuha</li>
        <li>Kemas rumah</li> -->
    </ul>

</div>



<script>
    // Create a "close" button and append it to each list item
    var myNodelist = document.getElementsByTagName("LI");
    var i;
    for (i = 0; i < myNodelist.length; i++) {
        // var span = document.createElement("SPAN");
        // var txt = document.createTextNode("\u00D7");
        // span.className = "close";
        // span.appendChild(txt);
        // myNodelist[i].appendChild(span);
    }

    // Click on a close button to hide the current list item
    // var close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
            var div = this.parentElement;
            div.style.display = "none";
        }
    }

    // Add a "checked" symbol when clicking on a list item
    var list = document.querySelector('ul');
    list.addEventListener('click', function(ev) {
        if (ev.target.tagName === 'LI') {
            ev.target.classList.toggle('checked');
        }
    }, false);

    // Create a new list item when clicking on the "Add" button
    function newElement() {
        var li = document.createElement("li");
        var inputValue = document.getElementById("myInput").value;
        var t = document.createTextNode(inputValue);
        li.appendChild(t);
        if (inputValue === '') {
            alert("No task entered!");
        } else {
            document.getElementById("myUL").appendChild(li);
        }
        document.getElementById("myInput").value = "";

        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        li.appendChild(span);

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }
    }
</script>