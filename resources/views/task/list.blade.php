<div class="head-nav">
    <a style="font-size: 20px;" href="{{ url('/') }}">< Back</a>
    <h2 style="margin: 0px 15px;">Todo List</h2>

    <div>
        <a href="{{ route('logout') }}" style="float: right;">Logout</a>
    </div>
</div>

<style>
    .head-nav {
        display: flex;
        width: 100%;
    }

    .create-task {
        padding-bottom: 20px;
    }

    .list-task {
        padding-bottom: 20px;
        /* max-width: 480px; */
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
        /* cursor: pointer; */
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
    /* ul li:hover {
        background: #ddd;
    } */

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

    /* Style the close button */
    .update {
        position: absolute;
        right: 0;
        top: 0;
        padding: 12px 16px 12px 16px;
    }

    .update:hover {
        background-color: #f44336;
        color: white;
    }

    /* Style the todo-header */
    .todo-header {
        background-color: green;
        padding: 30px 40px;
        color: white;
        text-align: center;
    }

    /* Clear floats after the todo-header */
    .todo-header:after {
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

    .pull-right {
        float: right;
    }

    .remove {
        padding-left: 10px;
    }

    .assign {
        padding-right: 10px;
    }
</style>


<div class="list-task">
    <div id="myDIV" class="todo-header">
        <h2>List of Tasks @if ($currUser->role == 2) {{ 'for '. $currUser->name}} @endif</h2>
        @if($currUser->role == 1)
        <form action="{{ route('task.store') }}" method="POST">
        @method('POST')
        @csrf
        <input type="text" name="note" placeholder="Enter task...">
        <button class="btn btn-success addBtn">Add Task</span>
        </form>
            <!-- <a href="{{ route('task.create') }}">Add Task</a> -->
        @endif
    </div>

    <ul id="myUL">
        @foreach($tasks as $task)
            @if($task->done == 1)
            <li class="checked">
            @else
            <li>
            @endif
                <span class="col-md-3">{{ $task->note }}</span>
                <!-- <span class="col-md-5 pull-right">{{ $task->userid }}</span> -->
                @if($currUser->role == 1)
                <div class="pull-right remove">
                    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button>Remove</span>
                    </form>
                </div>
                @endif
                @if($task->done == 0)
                <div class="pull-right">
                    <form action="{{ route('task.update', $task->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="text" name="done" value="1" hidden>
                        <button class="btn btn-success">Mark as Complete</span>
                    </form>
                </div>
                @else
                <div class="pull-right">
                    <form action="{{ route('task.update', $task->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="text" name="done" value="0" hidden>
                        <button class="btn btn-success">Mark as Incomplete</span>
                    </form>
                </div>
                @endif
                @if($currUser->role == 1)
                <div class="pull-right assign">
                    <form action="{{ route('task.update', $task->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <select name="userid" class="form-select" aria-label="Default select example">
                            @if (is_null($task->userid))
                            <option name="userid" selected>Assign to</option>
                            @endif ()
                            @foreach ($users as $user)
                                <option name="userid" value="{{ $user->id }}" @if($task->userid == $user->id) {{ 'selected' }} @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <button>Update</span>
                    </form>
                </div>
                @endif

                <!-- <span class="close">Remove</span> -->
            </li>
        @endforeach
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
    // var myNodelist = document.getElementsByTagName("LI");
    // var i;
    // for (i = 0; i < myNodelist.length; i++) {
    //     var span = document.createElement("SPAN");
    //     var txt = document.createTextNode("\u00D7");
    //     span.className = "close";
    //     span.appendChild(txt);
    //     myNodelist[i].appendChild(span);
    // }

    // Click on a close button to hide the current list item
    // var close = document.getElementsByClassName("close");
    // var i;
    // for (i = 0; i < close.length; i++) {
    //     close[i].onclick = function() {
    //         var div = this.parentElement;
    //         div.style.display = "none";
    //     }
    // }

    // Add a "checked" symbol when clicking on a list item
    // var list = document.querySelector('ul');
    // list.addEventListener('click', function(ev) {
    //     if (ev.target.tagName === 'LI') {
    //         ev.target.classList.toggle('checked');
    //     }
    // }, false);

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