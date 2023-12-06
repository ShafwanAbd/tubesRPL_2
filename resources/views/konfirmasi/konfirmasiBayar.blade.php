@extends('layouts.layout1')

@section('head')
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-1KFh9HylpQAOGMVc"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
<div class="buatSepatu lihatKomplain konfirmasiBayar">
    <div class="title">
        <h1>
            Bayar Sepatu
        </h1>
    </div>
    <div class="flex">
        <div class="holder left-side">
            <img src="{{ asset('imgSepatu/'.$sepatu->photo) }}">
        </div>
        <div class="right-side padding-top-10">
            <div class="left">
                <h5 class="item">Nama:</h5>
                <h5 class="item">Size:</h5>
                <h5 class="item">Harga:</h5>
            </div>
            <div class="right">
                <h5 class="item">{{ $datas->namaSepatu }}</h5>
                <h5 class="item">{{ $datas->size }}</h5>
                <h5 class="item">{{ @money($datas->harga) }}</h5>
                
                <div class="container-button">
                    <button class="btn1 bg-color-secondary text-white" id="pay-button">
                        Bayar
                    </button>
                </div>

                <form action="{{ url('konfirmasi_order/'.$id) }}" method="POST" id="submit_form">
                        @csrf
                        <input type="hidden" name="json" id="json_callback">
                    </form>

                    <script type="text/javascript">
                        // For example trigger on button clicked, or any time you need
                        var payButton = document.getElementById('pay-button');
                        payButton.addEventListener('click', function () {
                            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                            window.snap.pay('{{$snapToken}}', {
                            onSuccess: function(result){
                                /* You may add your own implementation here */
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onPending: function(result){
                                /* You may add your own implementation here */
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onError: function(result){
                                /* You may add your own implementation here */
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onClose: function(){
                                /* You may add your own implementation here */
                                alert('you closed the popup without finishing the payment');
                            }
                            })

                            function send_response_to_form(result){
                                document.getElementById('json_callback').value = JSON.stringify(result);
                                $('#submit_form').submit();
                            }
                        });
                    </script>

            </div>
        </div>
    </div>
    
</div>
@endsection