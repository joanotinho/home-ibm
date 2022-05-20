@extends('admin.layout.table_form')

@section('table')

    <div class="nested-sort-container">
        <div class="sorting-button">
            <button>ordenar</button>
        </div>

        @foreach ($users as $user_element)
            <div class="nested-sort">
                <div class="nested-sort-item" data-id="{{$user_element->id}}">
                    <div class="draggable-container">
                        <div class="draggable-background"></div>
                        <div class="draggable-field">
                            <div class="draggable-item">
                                <div class="user">
                                    <div class="user-left">
                                        <div class="field">
                                            <div class="description">
                                                <span>Nombre:</span>
                                            </div>
                                            <div class="value">
                                                <span>
                                                    {{$user_element->name}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="description">
                                                <span>Email:</span>
                                            </div>
                                            <div class="value">
                                                <span>{{$user_element->email}}</span>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="description">
                                                <span>Creado el:</span>
                                            </div>
                                            <div class="value">
                                                <span>{{$user_element->created_at}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-right">
                                        <div class="tooltip-container">
                                            <div class="tooltip">
                                                <div class="tooltip-text" data-name="Editar Usuario" data-position="left"></div>
                                            </div>
                                            <div class="edit-user-button" data-url="{{route('users_edit', ['user' => $user_element->id])}}">
                                                <svg viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tooltip-container">
                                            <div class="tooltip">
                                                <div class="tooltip-text" data-name="Borrar Usuario" data-position="right"></div>
                                            </div>
                                            <div class="delete-user-button" data-url="{{route('users_destroy', ['user' => $user_element->id])}}">
                                                <svg viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        @endforeach
    </div>
@endsection

@section('form')
    
    <div class="editor">
        <div class="tabs-container">
            <div class="top-bar">

                <div class="tabs">    
                    
                    <div class="tab active" data-tab-target="content">
                        <span>Descripción</span>
                    </div>
                </div>
                <div class="form-buttons">

                    <div class="form-button">

                        <div class="admin-form-submit-button">
                            <div class="tooltip-container">
                                <div class="tooltip">
                                    <div class="tooltip-text" data-name="Guardar" data-position="top"></div>
                                </div>
                                <div class="submit-button">
                                    <svg viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" />
                                    </svg>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-button">
                        <div class="tooltip-container">
                            <div class="tooltip">
                                <div class="tooltip-text" data-name="Limpiar" data-position="top"></div>
                            </div>
                            <div class="clean-button" data-url="{{route('users_create')}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19.36,2.72L20.78,4.14L15.06,9.85C16.13,11.39 16.28,13.24 15.38,14.44L9.06,8.12C10.26,7.22 12.11,7.37 13.65,8.44L19.36,2.72M5.93,17.57C3.92,15.56 2.69,13.16 2.35,10.92L7.23,8.83L14.67,16.27L12.58,21.15C10.34,20.81 7.94,19.58 5.93,17.57Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="form-button">
                        <div class="on-off-switch">
                            <div class="on-off-switch-form">
                                {{-- <input type="checkbox" name="" id="" checked class="on-off-switch-input"> --}}
                            </div>
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
            </div>

            <div class="tabs-contents">
                <form id="form" action="{{route("users_store")}}" class="admin-form">
                    <div class="tab-content active" data-tab-content="content">
                        {{ csrf_field() }}
                        
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($user->id) ? $user->id : ''}}" class="user-id">

                        <div class="errors-container"></div>

                        <div class="desktop-two-columns">
                            <div class="column">
                                <div class="field">
                                    <div class="field-label">
                                        <div class="label">
                                            <label for="">Nombre</label>
                                        </div>
                                        <div class="character-counter-container">
                                            <span class="character-counter">0</span>
                                            <span class="max-length-display"></span>
                                        </div>
                                    </div>
                                    <div class="field-input">
                                        <input type="text" name="name" id="name" data-type="nombre" class="counter-input" data-max-length="64" autocomplete="off" value="{{isset($user->name) ? $user->name : ''}}">
                                    </div>
                                    <div class="field-rule">
                                        <span>El nombre no puede estar vacío</span>
                                    </div>
                                </div>
                            </div>
                            <div class="column">

                                <div class="field">
                                    <div class="field-label">
                                        <div class="label">
                                            <label for="">Email</label>
                                        </div>
                                        <div class="character-counter-container">
                                            <span class="character-counter">0</span>
                                            <span class="max-length-display"></span>
                                        </div>
                                    </div>

                                    <div class="field-input">
                                        <input type="text" name="email" id="mail" data-type="email" data-max-length="255" class="counter-input" value="{{isset($user->email) ? $user->email : ''}}">
                                    </div>
                                    
                                    <div class="field-rule">
                                        <span>El email no puede estar vacío</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="desktop-two-columns">
                            <div class="column">
                                <div class="field">
                                    <div class="field-label">
                                        <label for="">Contraseña</label>
                                    </div>
                                    <div class="field-input">
                                        <input type="password" name="password" id="password" data-type="contraseña" data-max-length="100">
                                    </div>
                                    <div class="field-rule">
                                        <span>La contraseña debe contener al menos 8 carácteres, 1 número y un carácter especial</span>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <div class="field-label">
                                        <label for="">Repite contraseña</label>
                                    </div>
                                    <div class="field-input">
                                        <input type="password" name="password_confirmation" id="repeat-password" data-max-length="100">
                                    </div>
                                    <div class="field-rule">
                                        <span>Las contraseñas deben coincidir coinciden</span>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
                    <div class="tab-content" data-tab-content="images">
                        <div class="images-forms-container">

                            <div class="single-image-container">
                                <div class="tooltip-container">
                                    <div class="tooltip">
                                        <div class="tooltip-text" data-name="Añadir foto" data-position="custom"></div>
                                    </div>
                                    <div class="image-container first-image-container">
                                        <div class="add-image-button">
                                            <input type="file" accept="image/*" class="image-input" name="">
                                            <label class="image-label" for="">
                                                <svg viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M19,19V5H5V19H19M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5C3,3.89 3.9,3 5,3H19M11,7H13V11H17V13H13V17H11V13H7V11H11V7Z" />
                                                </svg>
                                            </label>
                                        </div>

                                        <img src="" alt="" class="image">
                                        <div class="delete-image">
                                            <svg viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M20.37,8.91L19.37,10.64L7.24,3.64L8.24,1.91L11.28,3.66L12.64,3.29L16.97,5.79L17.34,7.16L20.37,8.91M6,19V7H11.07L18,11V19A2,2 0 0,1 16,21H8A2,2 0 0,1 6,19Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="multiple-images-container">
                                {{-- <div class="tooltip-container"> --}}
                                    {{-- <div class="tooltip">
                                        <div class="tooltip-text" data-name="Añadir foto" data-position="custom"></div>
                                    </div> --}}
                                    <div class="image-container first-image-container">
                                        <div class="add-image-button">
                                            <input type="file" accept="image/*" class="image-input" name="">
                                            <label class="image-label" for="">
                                                <svg viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M19,19V5H5V19H19M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5C3,3.89 3.9,3 5,3H19M11,7H13V11H17V13H13V17H11V13H7V11H11V7Z" />
                                                </svg>
                                            </label>
                                        </div>

                                        <img src="" alt="" class="image">
                                        <div class="delete-image">
                                            <svg viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M20.37,8.91L19.37,10.64L7.24,3.64L8.24,1.91L11.28,3.66L12.64,3.29L16.97,5.79L17.34,7.16L20.37,8.91M6,19V7H11.07L18,11V19A2,2 0 0,1 16,21H8A2,2 0 0,1 6,19Z" />
                                            </svg>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" data-tab-content="seo">
                        <div class="nested-sort-container">

                            <div class="sorting-button">
                                <button>ordenar</button>
                            </div>
                            <div class="nested-sort">
                                <div data-id="1" class="nested-sort-item" data-name="Inicio">
                                    <span>Inicio</span>
                                </div>
                                <div data-id="2" class="nested-sort-item" data-name="Tienda">
                                    <span>Tienda</span>
                                </div>
                                <div data-id="3" class="nested-sort-item" data-name="Contacto">
                                    <span>Contacto</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection