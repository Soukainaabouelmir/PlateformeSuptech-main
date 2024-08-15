<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
        @media (width: 1024px) {
            #Divglobale {
                margin-right: 50px;
                /* Hide the sidebar by default on smaller screens */
            }
        }

        @media (min-width: 1025px) and (max-width:1444 px) {
            #Divglobale {
                margin-left: 0px;
                /* Hide the sidebar by default on smaller screens */
            }
        }

        @media (min-width: 768px) {
            #Divglobale {
                margin-left: 214px;
                /* Set max-width to match iPad Air width */
            }
        }
        @media (width: 2560px) {
           table {
               width: 2204px;
                /* Set max-width to match iPad Air width */
            }
        }
        .fixed {
            margin-top: 20PX;
        }

        .fixed2 {
            margin-top: 20PX;

        }
       
    </style>

    @endsection
