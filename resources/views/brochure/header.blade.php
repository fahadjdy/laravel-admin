

<div class="d-flex justify-content-between align-items-center p-2">
    <div class="">
        <p class="fw-bold text-decoration-underline p-0">INVOICE</p>
        <h1 class="fw-bold p-0 m-0"><?= $header['name'] ?? '#NAME' ?></h1>
        <p class="p-0 m-0"><?= $header['address_1'] ?? '#ADDRESS' ?></p>
        <span><?= $header['contact_1'] ?? '#CONTACT' ?>  | <?= $header['email_1']  ?? '#EMAIL' ?></span>
    </div>
    <div>
        <img src="{{ asset($header['logo']) }}" alt="<?= $header['name'] ?>" height="150px">
    </div>
</div>