@extends('admin.layout.table_form')

@section('table')
        <div class="user">
            <div class="user-left">
                <div class="field">
                    <div class="description">
                        <span>Nombre:</span>
                    </div>
                    <div class="value">
                        <span>
                            sdfhgdf
                        </span>
                    </div>
                </div>
                <div class="field">
                    <div class="description">
                        <span>Email:</span>
                    </div>
                    <div class="value">
                        <span>general</span>
                    </div>
                </div>
                <div class="field">
                    <div class="description">
                        <span>Creado el:</span>
                    </div>
                    <div class="value">
                        <span>22-04-2022</span>
                    </div>
                </div>
            </div>
            <div class="user-right">
                <div class="edit-button">
                    <svg viewBox="0 0 24 24">
                        <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                    </svg>
                </div>
                <div class="delete-button">
                    <svg viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                    </svg>
                </div>
            </div>
        </div>
@endsection

@section('form')
    
        <div class="editor">
            <div class="tabs-container">
                <div class="tabs">
                    <div class="tabs-left">    
                        <div class="tab active" data-tab-target="content">
                            <span>Descripción</span>
                        </div>
                        <div class="tab" data-tab-target="images">
                            <span>Opiniones</span>
                        </div>
                        <div class="tab" data-tab-target="seo">
                            <span>Especificaciones</span>
                        </div>
                    </div>
                    <div class="tabs-right">
                        <div class="clean-button">
                            <svg viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19.36,2.72L20.78,4.14L15.06,9.85C16.13,11.39 16.28,13.24 15.38,14.44L9.06,8.12C10.26,7.22 12.11,7.37 13.65,8.44L19.36,2.72M5.93,17.57C3.92,15.56 2.69,13.16 2.35,10.92L7.23,8.83L14.67,16.27L12.58,21.15C10.34,20.81 7.94,19.58 5.93,17.57Z" />
                            </svg>
                        </div>
                        <div class="on-off-switch">
                            <div class="on-off-switch-items">
                                <div class="on">
                                    <span>ON</span>
                                </div>
                                <div class="icon">
                                    <svg viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M8 3H16C18.76 3 21 5.24 21 8V16C21 18.76 18.76 21 16 21H8C5.24 21 3 18.76 3 16V8C3 5.24 5.24 3 8 3Z" />
                                    </svg>
                                </div>
                                <div class="off">
                                    <span>OFF</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs-contents">
                    <div class="tab-content active" data-tab-content="content">
                        <form class="admin-form" id="form" action="" autocomplete="off">
                            <form method="POST" action="" id="form" class="front-form">
                            {{ csrf_field() }}

                            <div class="errors-container"></div>
                            
                            <input autocomplete="false" name="hidden" type="text" style="display:none;">
                            <input type="hidden" name="id" value="{{isset($user->id) ? $user->id : ''}}">

                            <div class="desktop-two-columns">
                                <div class="column">
                                    <div class="field">
                                        <label for="">
                                            Nombre
                                        </label>
                                        <input type="text" name="name" class="required" id="name">
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="">
                                            Email
                                        </label>
                                        <input type="text" name="email" class="required" id="email">
                                    </div>
                                </div>
                            </div>

                            <div class="desktop-two-columns">
                                <div class="column">
                                    <div class="field">
                                        <label for="">
                                            Contraseña
                                        </label>
                                        <input type="password" name="password" class="required" id="password">
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="">
                                            Repite contraseña
                                        </label>
                                        <input type="password" name="password_confirmation" class="required">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="locale-tabs-container">
                                <div class="tabs">
                                    <div class="locale-tab active" data-tab-target="spanish">
                                        <span>Español</span>
                                    </div>
                                </div>
                                <div class="tabs-contents">
                                    <div class="locale-tab-content active" data-tab-content="spanish">
                                        <form action="">
                                            <div class="field">
                                                <label for="">Título</label>
                                                <input type="text" name="" id="">
                                            </div>
                                            <div class="field">
                                                <label for="">Descripción</label>
                                                <textarea name="content" id="" class="ckeditor">
                                                    
                                                </textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                                 --}}

                            <div class="submit-button">
                                <button type="button">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-content" data-tab-content="images">
                        
                    </div>
                    <div class="tab-content" data-tab-content="seo">
                        <span>
                            1984 de George Orwell es una novela de distopía cuya trama ocurre en Oceanía, un país dominado por un gobierno totalitario que mantiene en constante vigilancia a sus ciudadanos e, incluso, insiste en espiar sus pensamientos para mantener el orden.
                            La novela es una de las obras más icónicas del siglo XX por su denuncia de prácticas establecidas por gobiernos como los de Franco y Stalin, las cuales han sido adoptadas por muchos dictadores a lo largo de la historia.
                        </span>
                    </div>
                </div>
            </div>
        </div>

    <x-deleteConfirmation></x-deleteConfirmation>
    <x-cleanConfirmation></x-cleanConfirmation>
    <x-savedChanges></x-savedChanges>

@endsection