@extends('admin.layout.table_form')

@section('table')

        <div class="nested-sort-container">
            <div class="sorting-button">
                <button>ordenar</button>
            </div>

            <div class="nested-sort">
                @if(isset($sales))
                    @foreach ($sales as $sale_element)
                        <div class="nested-sort-item" data-id="{{$sale_element->id}}">
                            <div class="draggable-container">
                                <div class="draggable-background"></div>
                                <div class="draggable-field">
                                    <div class="draggable-item">
                                        <div class="user">
                                            <div class="user-left">
                                                <div class="field">
                                                    <div class="description">
                                                        <span>Id:</span>
                                                    </div>
                                                    <div class="value">
                                                        <span>
                                                            {{$sale_element->id}}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="field">
                                                    <div class="description">
                                                        <span>Id cliente:</span>
                                                    </div>
                                                    <div class="value">
                                                        <span>{{$sale_element->customer_id}}</span>
                                                    </div>
                                                </div>
                                                <div class="field">
                                                    <div class="description">
                                                        <span>Número de ticket:</span>
                                                    </div>
                                                    <div class="value">
                                                        <span>{{$sale_element->ticket_number}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-right">
                                                <div class="tooltip-container">
                                                    <div class="tooltip">
                                                        <div class="tooltip-text" data-name="Editar Usuario" data-position="left"></div>
                                                    </div>
                                                    <div class="edit-user-button" data-url="{{route('sales_edit', ['sale' => $sale_element->id])}}">
                                                        <svg viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="tooltip-container">
                                                    <div class="tooltip">
                                                        <div class="tooltip-text" data-name="Borrar Usuario" data-position="right"></div>
                                                    </div>
                                                    <div class="delete-user-button" data-url="{{route('sales_destroy', ['sale' => $sale_element->id])}}">
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
                    @endforeach
                @endif   
                @if (count($sales) == 0)
                    <div class="no-registers-found">
                        <span>No se han encontrado registros</span>
                    </div>
                @endif
            </div>    
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
                            <div class="clean-button" data-url="{{route('sales_create')}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19.36,2.72L20.78,4.14L15.06,9.85C16.13,11.39 16.28,13.24 15.38,14.44L9.06,8.12C10.26,7.22 12.11,7.37 13.65,8.44L19.36,2.72M5.93,17.57C3.92,15.56 2.69,13.16 2.35,10.92L7.23,8.83L14.67,16.27L12.58,21.15C10.34,20.81 7.94,19.58 5.93,17.57Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="form-button">
                        <div class="on-off-switch">
                            <div class="on-off-switch-form">
                                <input type="checkbox" name="" id="" checked class="on-off-switch-input">
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
                <form id="form" action="{{route("sales_store")}}" class="admin-form">
                    <div class="tab-content active" data-tab-content="content">
                        {{ csrf_field() }}
                        
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($sale->id) ? $sale->id : ''}}" class="user-id">

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
                                        <input type="text" name="customer_id" id="customer_id" data-type="customer_id" class="counter-input" data-max-length="64" autocomplete="off" value="{{isset($sale->customer_id) ? $sale->customer_id : ''}}">
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
                                            <label for="">Title</label>
                                        </div>
                                        <div class="character-counter-container">
                                            <span class="character-counter">0</span>
                                            <span class="max-length-display"></span>
                                        </div>
                                    </div>

                                    <div class="field-input">
                                        <input type="text" name="ticket_number" id="ticket_number" data-type="ticket_number" data-max-length="255" class="counter-input" value="{{isset($sale->ticket_number) ? $sale->ticket_number : ''}}">
                                    </div>
                                    
                                    <div class="field-rule">
                                        <span>El email no puede estar vacío</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection