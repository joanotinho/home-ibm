@extends('front.layout.master')

@section('content')
    <div class="contact">
        <div class="contact-title center">
            <h3>Contacta con nosotros</h3>
        </div>
        <div class="contact-main desktop-two-columns mobile-single-column">
            <div class="column">
                <div class="contact-info desktop-two-columns mobile-single-column">
                    <div class="column">
                        <div class="contact-info-item">
                            
                            <div class="desktop-two-columns mobile-single-column">
                                <div class="column">
                                    <div class="contact-info-icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="contact-info-text center">
                                        <span>674158017</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="contact-info-item">
                            <div class="desktop-two-columns mobile-single-column">
                                <div class="column">
                                    <div class="contact-info-icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="contact-info-text center">
                                        <span>joanbaixauli2004@gmail.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="contact-info-item">
                            <div class="desktop-two-columns mobile-single-column">
                                <div class="column">
                                    <div class="contact-info-icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                        </svg>
                                    </div> 
                                </div>
                                <div class="column">
                                    <div class="contact-info-text center">
                                        <span>C. de Colubí, 18, 07013 Palma, Illes Balears</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="contact-form">
                    <form method="POST" action="" id="form" class="front-form">
                        <div class="errors-container parent">
                            <div class="close-button">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="desktop-two-columns mobile-single-column">
                            <div class="column">
                                <div class="contact-form-item">
                                    <input type="text" name="name" id="name" placeholder="Nombre:" class="required" data-type="nombre">
                                </div>
                            </div>
                            <div class="column">
                                <div class="contact-form-item">
                                    <input type="text" name="surnames" id="surname" placeholder="Apellidos:" class="required" data-type="apellidos">
                                </div>
                            </div>
                        </div>
                        <div class="desktop-two-columns mobile-single-column">
                            <div class="column">
                                <div class="contact-form-item">
                                    <input type="text" name="mail" id="mail" placeholder="Email:" class="required" data-type="email">
                                </div>
                            </div>
                            <div class="column">
                                <div class="contact-form-item">
                                    <input type="text" name="telephone" id="telephone" placeholder="Número de teléfono:" class="required" data-type="telefono">
                                </div>
                            </div>
                        </div>
                        <div class="desktop-single-column mobile-single-column">
                            <div class="column">
                                <div class="contact-form-item">
                                    <textarea id="editor1" name="content" class="required ckeditor" data-type="comentario">
                                        
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="desktop-single-column mobile-single-column">
                            <div class="column">
                                <div class="contact-form-item">
                                    <textarea id="editor2" name="content2" class="required ckeditor" data-type="comentariofeo">
                                        
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="desktop-single-column mobile-single-column">
                            <div class="column">
                                <div class="contact-form-item">
                                    <div class="contact-form-item-button" id="submit">
                                        <button type="submit" id="button" class="submit-button">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection