<style>
    /**
 * Oscuro: #283035
 * Azul: #03658c
 * Detalle: #c7cacb
 * Fondo: #dee1e3
 ----------------------------------*/
    * {
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    a {
        color: #03658c;
        text-decoration: none;
    }

    ul {
        list-style-type: none;
    }

    body {
        font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
        background: #dee1e3;
    }

    /** ====================
     * Lista de Comentarios
     =======================*/
    .comments-container {
        margin: 60px auto 15px;
        width: 768px;
    }

    .comments-container h1 {
        font-size: 36px;
        color: #283035;
        font-weight: 400;
    }

    .comments-container h1 a {
        font-size: 18px;
        font-weight: 700;
    }

    .comments-list {
        margin-top: 30px;
        position: relative;
    }

    /**
     * Lineas / Detalles
     -----------------------*/
    .comments-list:before {
        content: '';
        width: 2px;
        height: 100%;
        background: #c7cacb;
        position: absolute;
        left: 32px;
        top: 0;
    }

    .comments-list:after {
        content: '';
        position: absolute;
        background: #c7cacb;
        bottom: 0;
        left: 27px;
        width: 7px;
        height: 7px;
        border: 3px solid #dee1e3;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .reply-list:before, .reply-list:after {
        display: none;
    }

    .reply-list li:before {
        content: '';
        width: 60px;
        height: 2px;
        background: #c7cacb;
        position: absolute;
        top: 25px;
        left: -55px;
    }


    .comments-list li {
        margin-bottom: 15px;
        display: block;
        position: relative;
    }

    .comments-list li:after {
        content: '';
        display: block;
        clear: both;
        height: 0;
        width: 0;
    }

    .reply-list {
        padding-left: 88px;
        clear: both;
        margin-top: 15px;
    }

    /**
     * Avatar
     ---------------------------*/
    .comments-list .comment-avatar {
        width: 65px;
        height: 65px;
        position: relative;
        z-index: 99;
        float: left;
        border: 3px solid #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .comments-list .comment-avatar img {
        width: 100%;
        height: 100%;
    }

    .reply-list .comment-avatar {
        width: 50px;
        height: 50px;
    }

    .comment-main-level:after {
        content: '';
        width: 0;
        height: 0;
        display: block;
        clear: both;
    }

    /**
     * Caja del Comentario
     ---------------------------*/
    .comments-list .comment-box {
        width: 680px;
        float: right;
        position: relative;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
    }

    .comments-list .comment-box:before, .comments-list .comment-box:after {
        content: '';
        height: 0;
        width: 0;
        position: absolute;
        display: block;
        border-width: 10px 12px 10px 0;
        border-style: solid;
        border-color: transparent #FCFCFC;
        top: 8px;
        left: -11px;
    }

    .comments-list .comment-box:before {
        border-width: 11px 13px 11px 0;
        border-color: transparent rgba(0, 0, 0, 0.05);
        left: -12px;
    }

    .reply-list .comment-box {
        width: 610px;
    }

    .comment-box .comment-head {
        background: #FCFCFC;
        padding: 10px 12px;
        border-bottom: 1px solid #E5E5E5;
        overflow: hidden;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
    }

    .comment-box .comment-head i {
        float: right;
        margin-left: 14px;
        position: relative;
        top: 2px;
        color: #A6A6A6;
        cursor: pointer;
        -webkit-transition: color 0.3s ease;
        -o-transition: color 0.3s ease;
        transition: color 0.3s ease;
    }

    .comment-box .comment-head i:hover {
        color: #03658c;
    }

    .comment-box .comment-name {
        color: #283035;
        font-size: 14px;
        font-weight: 700;
        float: left;
        margin-right: 10px;
    }

    .comment-box .comment-name a {
        color: #283035;
    }

    .comment-box .comment-head span {
        float: left;
        color: #999;
        font-size: 13px;
        position: relative;
        top: 1px;
    }

    .comment-box .comment-content {
        background: #FFF;
        padding: 12px;
        font-size: 15px;
        color: #595959;
        -webkit-border-radius: 0 0 4px 4px;
        -moz-border-radius: 0 0 4px 4px;
        border-radius: 0 0 4px 4px;
    }

    .comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {
        color: #03658c;
    }

    .comment-box .comment-name.by-author:after {
        content: 'autors';
        background: #03658c;
        color: #FFF;
        font-size: 12px;
        padding: 3px 5px;
        font-weight: 700;
        margin-left: 10px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    /** =====================
     * Responsive
     ========================*/
    @media only screen and (max-width: 766px) {
        .comments-container {
            width: 480px;
        }

        .comments-list .comment-box {
            width: 390px;
        }

        .reply-list .comment-box {
            width: 320px;
        }
    }
</style>
<!-- Contenedor Principal -->
<div class="comments-container">
    <ul id="comments-list" class="comments-list">
        @foreach($comments as $comment)
            @if($comment->show && $comment->reply_id ==null)
            <li>
                <div class="comment-main-level">
                    <!-- Avatar -->
                    <div class="comment-avatar ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor"
                             class="bi bi-emoji-sunglasses-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v.116A4.22 4.22 0 0 1 8 5c.35 0 .69.04 1 .116V5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-1.994-1.839A2.99 2.99 0 0 0 8 6c-.393 0-.74.064-1.006.161A2 2 0 0 1 5 8h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM4.969 9.75A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .866-.5z"/>
                        </svg>
                    </div>
                    <!-- Contenedor del Comentario -->
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name"><a>{{$comment->user->name}}</a></h6>
                            <span>{{$comment->created_at->diffForHumans()}}</span>
                            <i class="fa fa-reply"></i>
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="comment-content">
                            {{$comment->text}}
                        </div>
                    </div>
                </div>
            </li>
                {{--@include('layouts._partials_comment',['comments'=>$comment->reply])--}}
            @endif
        @endforeach
        {{-- <li>
             <div class="comment-main-level">
                 <!-- Avatar -->
                 <div class="comment-avatar"><img src="" alt=""></div>
                 <!-- Contenedor del Comentario -->
                 <div class="comment-box">
                     <div class="comment-head">
                         <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                         <span>hace 20 minutos</span>
                         <i class="fa fa-reply"></i>
                         <i class="fa fa-heart"></i>
                     </div>
                     <div class="comment-content">
                         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium
                         vitae, praesentium optio, sapiente distinctio illo?
                     </div>
                 </div>
             </div>
             <!-- Respuestas de los comentarios -->
             <ul class="comments-list reply-list">
                 <li>
                     <!-- Avatar -->
                     <div class="comment-avatar"><img
                             alt=""></div>
                     <!-- Contenedor del Comentario -->
                     <div class="comment-box">
                         <div class="comment-head">
                             <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                             <span>hace 10 minutos</span>
                             <i class="fa fa-reply"></i>
                             <i class="fa fa-heart"></i>
                         </div>
                         <div class="comment-content">
                             Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure
                             laudantium vitae, praesentium optio, sapiente distinctio illo?
                         </div>
                     </div>
                 </li>

                 <li>
                     <!-- Avatar -->
                     <div class="comment-avatar"><img
                             alt=""></div>
                     <!-- Contenedor del Comentario -->
                     <div class="comment-box">
                         <div class="comment-head">
                             <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a>
                             </h6>
                             <span>hace 10 minutos</span>
                             <i class="fa fa-reply"></i>
                             <i class="fa fa-heart"></i>
                         </div>
                         <div class="comment-content">
                             Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure
                             laudantium vitae, praesentium optio, sapiente distinctio illo?
                         </div>
                     </div>
                 </li>
             </ul>
         </li>

         <li>
             <div class="comment-main-level">
                 <!-- Avatar -->
                 <div class="comment-avatar"><img
                         alt=""></div>
                 <!-- Contenedor del Comentario -->
                 <div class="comment-box">
                     <div class="comment-head">
                         <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                         <span>hace 10 minutos</span>
                         <i class="fa fa-reply"></i>
                         <i class="fa fa-heart"></i>
                     </div>
                     <div class="comment-content">
                         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium
                         vitae, praesentium optio, sapiente distinctio illo?
                     </div>
                 </div>
             </div>
         </li>--}}
    </ul>
</div>
