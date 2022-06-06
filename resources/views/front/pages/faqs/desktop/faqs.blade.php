<div class="faqs-container">

    @if(isset($faqs))
        <div class="faqs">
            @foreach($faqs as $faq)
                <div class="faq">
                    <div class="faq-top-bar">

                        <div class="faq-title">
                            <h3>{{$faq->title}}</h3>
                        </div>
                
                        <div class="faq-icons">
                
                            <div class="faq-icon arrow">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                
                    <div class="faq-content">
                        <p>
                            {{!!$faq->description!!}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
        