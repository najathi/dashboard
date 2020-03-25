<!-- Lightgallery CSS -->
<link href="{{ asset('dist') }}/css/lightgallery.css" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="{{ asset('dist') }}/css/style.css" rel="stylesheet" type="text/css">

<!-- Toggles CSS -->
<link href="{{ asset('vendors') }}/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
<link href="{{ asset('vendors') }}/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">


<!-- Signature Pad -->
<link rel="stylesheet" href="{{ asset('asset') }}/css/signature-pad.css">

<style type="text/css">
    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
        margin: auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .vertical-alignment-helper {
        display:table;
        height: 100%;
        width: 100%;
        pointer-events:none; /* This makes sure that we can still click outside of the modal to close it */
    }
    .vertical-align-center {
        /* To center vertically */
        display: table-cell;
        vertical-align: middle;
        pointer-events:none;
    }
    .modal-content {
        /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
        width:inherit;
        max-width:inherit; /* For Bootstrap 4 - to avoid the modal window stretching full width */
        height:inherit;
        /* To center horizontally */
        margin: 0 auto;
        pointer-events: all;
    }
</style>
