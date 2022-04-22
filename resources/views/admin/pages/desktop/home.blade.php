@extends('admin.layout.master')

@section('content')

    <div class="container">
        <div class="users">
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
                            <span>Categoría:</span>
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
        </div>

        <div class="form-column">
            <div class="form">
                <form action="">
                    <div class="desktop-two-columns">
                        <div class="column">
                            <div class="field">
                                <label for="">Nombre:</label>
                                <input type="text" name="" id="">
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" name="apellidos" id="">
                            </div>
                        </div>
                    </div>
                    <div class="desktop-two-columns">
                        <div class="column">
                            <div class="field">
                                <label for="apellidos">Email:</label>
                                <input type="text" name="apellidos" id="">
                            </div>
                        </div>
                        <div class="column">
                
                            <div class="field">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" name="telefono" id="">
                            </div>
                        </div>
                    </div>
                
                    <div class="desktop-single-column">
                        <div class="column">
                            <div class="textarea">
                                <label for="">Déjanos un comentario:</label>
                                <textarea name="" id="" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="desktop-single-column">
                        <div class="submit-button">
                            <button type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-deleteConfirmation></x-deleteConfirmation>
@endsection
    