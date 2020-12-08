<footer class="pt-3 bg-secondary text-white">
    <div class="container">
        {{-- Section-end with links to company and
        social-network--}}
        <div class="d-flex flex-row flex-wrap align-items-center justify-content-between">



            {{-- Privacy Policy --}}
            <div class="d-flex">
                <label class="mr-3">© 2020 BoolBnB, Inc. All rights reserved</label>

                <!-- Button trigger modal -->
                <a class="hover" data-toggle="modal" data-target="#staticBackdrop">Privacy Policy</a>

                <!-- Modal -->
                <div class="modal fade color-primary modal-tr" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{-- title Modal --}}
                            <div class="modal-header">
                                <h5 class="modal-title color-secondary" id="staticBackdropLabel">Privacy Policy
                                    BoolBnB</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            {{-- Model Privacy Policy --}}
                            <div class="modal-body">

                                <h6>Informativa sulla privacy,Ultimo aggiornamento: 30 ottobre 2020.</h6>

                                <p>
                                    La missione di BoolBnB è aiutare a stabilire connessioni tra le persone e
                                    promuovere
                                    un
                                    modo di pensare più aperto e inclusivo. In breve, desideriamo creare un mondo in
                                    cui
                                    chiunque possa sentirsi a casa, ovunque. Siamo una community fondata sulla
                                    fiducia.
                                    Una
                                    parte fondamentale del guadagnare tale fiducia consiste nell'essere chiari su
                                    come
                                    utilizziamo le tue informazioni e nel proteggere il tuo diritto umano alla
                                    privacy.
                                </p>
                                <p>
                                    La presente Informativa sulla privacy descrive il modo in cui BoolBnB, Inc. e le
                                    sue
                                    affiliate ("noi", "ci" o "BoolBnB") trattano i dati personali che raccogliamo
                                    attraverso
                                    la Piattaforma BoolBnB. In base a dove vivi e al tipo di attività che svolgi
                                    sulla
                                    Piattaforma BoolBnB, potrebbero applicarsi a te le pagine aggiuntive sulla
                                    privacy
                                    elencate di seguito. Segui i link e consulta le informazioni aggiuntive ivi
                                    fornite
                                    insieme con le informazioni su come trattiamo le informazioni personali per tali
                                    regioni
                                    e servizi.
                                </p>
                                IMPORTANTI INFORMAZIONI AGGIUNTIVE

                                <p>
                                    Al di fuori degli Stati Uniti. Se risiedi al di fuori degli Stati Uniti, ad
                                    esempio
                                    nello Spazio economico europeo ("SEE") visita la nostra pagina "Al di fuori
                                    degli
                                    Stati
                                    Uniti" per conoscere (i) il titolare (o i titolari) del trattamento dei tuoi
                                    dati
                                    personali; (ii) le basi giuridiche, fra cui i legittimi interessi, per la
                                    raccolta e
                                    il
                                    trattamento delle tue informazioni personali (iii), le garanzie su cui ci
                                    basiamo
                                    per
                                    trasferire le tue informazioni personali al di fuori dello SEE; (iv) i tuoi
                                    diritti,
                                    e
                                    (v) i dati di contatto del titolare (o dei titolari) del trattamento e del
                                    Responsabile
                                    della protezione dei dati.
                                </p>
                                <p>
                                    California e Vermont. Se risiedi in California or Vermont, visita la nostra
                                    pagina
                                    "California e Vermont" per informazioni specifiche sulla privacy a te
                                    applicabili.
                                </p>
                                <p>
                                    Cina. Se risiedi nella Repubblica popolare cinese, che ai fini della presente
                                    Informativa sulla privacy non include Hong Kong, Macao e Taiwan ("Cina"), visita
                                    la
                                    nostra pagina "Cina" per informazioni sui tuoi diritti e altre informazioni
                                    specifiche a
                                    te applicabili.
                                </p>
                                <p>
                                    Clienti Azienda e BoolBnB for Work. Se utilizzi i nostri servizi aziendali o hai
                                    collegato il tuo account a un cliente BoolBnB for Work, visita la nostra pagina
                                    "Clienti
                                    Azienda e BoolBnB for Work" per informazioni specifiche sulla privacy a te
                                    applicabili.
                                </p>
                            </div>
                            {{-- Buttom Close Modal --}}
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info btm-link"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="social-links d-flex">
                <div class="social-links-item">
                    <i class="fab fa-facebook"></i>
                </div>
                <div class="social-links-item">
                    <i class="fab fa-twitter-square"></i>
                </div>
                <div class="social-links-item">
                    <i class="fab fa-instagram"></i>
                </div>
                <div class="social-links-item">
                    <i class=" fab fa-youtube"></i>
                </div>
            </div>

        </div>







    </div>

</footer>

@include('layouts.partials.search-template')

@if ((Route::currentRouteName()  == 'homepage') || (Route::currentRouteName()  == 'search'))
<script>
    AOS.init();
</script>
@endif