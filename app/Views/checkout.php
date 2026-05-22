<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ödeme - Jarvis AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
        body {
            background: #050505;
            color: white;
            font-family: Arial, sans-serif;
            padding: 60px;
        }

        .box {
            max-width: 800px;
            margin: auto;
            background: rgba(255,255,255,0.04);
            border: 1px solid #00f3ff;
            border-radius: 20px;
            padding: 35px;
        }

        h1 {
            color: #00f3ff;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            margin-top: 15px;
            color: #00f3ff;
            font-weight: 600;
        }

        select.form-control,
        input.form-control,
        textarea.form-control {
            background: #101010 !important;
            color: #ffffff !important;
            border: 1px solid rgba(0, 243, 255, 0.55) !important;
            border-radius: 8px;
            padding: 12px 14px;
        }

        select.form-control:focus,
        input.form-control:focus,
        textarea.form-control:focus {
            background: #111 !important;
            color: #ffffff !important;
            border-color: #00f3ff !important;
            box-shadow: 0 0 10px rgba(0, 243, 255, 0.35) !important;
        }

        select.form-control option {
            background: #101010;
            color: #ffffff;
        }

        input::placeholder,
        textarea::placeholder {
            color: rgba(255, 255, 255, 0.35) !important;
        }

        .payment-summary {
            border: 1px solid rgba(0,243,255,0.35);
            background: rgba(0,243,255,0.04);
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 28px;
        }

        .payment-summary h3 {
            color: #00f3ff;
            font-size: 22px;
            margin-bottom: 18px;
            text-align: center;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0,243,255,0.15);
            padding: 12px 0;
            color: #ddd;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-row strong {
            color: #fff;
        }

        .balance-used strong {
            color: #00f3ff;
        }

        .card-payment {
            margin-top: 10px;
            padding-top: 16px;
        }

        .card-payment span,
        .card-payment strong {
            color: #00f3ff;
            font-size: 18px;
        }

        .alert-balance {
            color: #00f3ff;
            border: 1px solid rgba(0,243,255,0.4);
            background: rgba(0,243,255,0.06);
            border-radius: 14px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        .card-fields.hidden {
            display: none;
        }

        .btn-neon {
            background: rgba(0,243,255,0.15);
            color: #00f3ff;
            border: 1px solid #00f3ff;
            padding: 12px 30px;
            border-radius: 50px;
            margin-top: 25px;
            width: 100%;
            font-weight: bold;
            transition: 0.25s ease;
        }

        .btn-neon:hover {
            background: #00f3ff;
            color: #000;
            box-shadow: 0 0 18px rgba(0, 243, 255, 0.5);
        }

        .hint {
            color: rgba(255,255,255,0.45);
            font-size: 13px;
            margin-top: 6px;
        }

        @media (max-width: 768px) {
            body {
                padding: 25px;
            }

            .box {
                padding: 24px;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<?php
    $cartTotal = 0;

    foreach ($cart as $item) {
        $price = isset($item['price']) ? (float)$item['price'] : 0;
        $qty = isset($item['qty']) ? (int)$item['qty'] : 1;
        $cartTotal += $price * $qty;
    }

    $balance = (float)(session()->get('balance') ?? 0);

    $usedBalance = 0;
    $cardPayment = $cartTotal;

    if ($balance > 0) {
        if ($balance >= $cartTotal) {
            $usedBalance = $cartTotal;
            $cardPayment = 0;
        } else {
            $usedBalance = $balance;
            $cardPayment = $cartTotal - $balance;
        }
    }
?>

<div class="box">
    <h1>Ödeme ve Sipariş Bilgileri</h1>

    <form action="<?= base_url('siparis-olustur') ?>" method="post">
        <div class="payment-summary">
            <h3>Ödeme Özeti</h3>

            <div class="summary-row">
                <span>Sepet Toplamı</span>
                <strong><?= number_format($cartTotal, 2, ',', '.') ?> TL</strong>
            </div>

            <div class="summary-row">
                <span>Hesap Bakiyeniz</span>
                <strong><?= number_format($balance, 2, ',', '.') ?> TL</strong>
            </div>

            <div class="summary-row balance-used">
                <span>Kullanılacak Bakiye</span>
                <strong>- <?= number_format($usedBalance, 2, ',', '.') ?> TL</strong>
            </div>

            <div class="summary-row card-payment">
                <span>Karttan Çekilecek Tutar</span>
                <strong><?= number_format($cardPayment, 2, ',', '.') ?> TL</strong>
            </div>
        </div>

        <?php if ($cardPayment <= 0): ?>
            <div class="alert-balance">
                Bu sipariş tamamen hesap bakiyenizden karşılanacaktır. Kart bilgisi girmenize gerek yoktur.
            </div>
        <?php endif; ?>

        <label>Adres</label>
        <textarea name="address" class="form-control" rows="4" required></textarea>

        <label>Ülke</label>
        <select id="countryCode" class="form-control mb-3">
            <option value="+90" data-length="10" data-placeholder="555 111 22 33" selected>Türkiye (+90)</option>
            <option value="+1" data-length="10" data-placeholder="555 111 2233">ABD / Kanada (+1)</option>
            <option value="+44" data-length="10" data-placeholder="7400 123456">İngiltere (+44)</option>
            <option value="+49" data-length="11" data-placeholder="151 12345678">Almanya (+49)</option>
            <option value="+33" data-length="9" data-placeholder="6 12 34 56 78">Fransa (+33)</option>
            <option value="+39" data-length="10" data-placeholder="312 345 6789">İtalya (+39)</option>
            <option value="+34" data-length="9" data-placeholder="612 345 678">İspanya (+34)</option>
            <option value="+31" data-length="9" data-placeholder="6 12345678">Hollanda (+31)</option>
            <option value="+32" data-length="9" data-placeholder="470 12 34 56">Belçika (+32)</option>
            <option value="+43" data-length="10" data-placeholder="660 1234567">Avusturya (+43)</option>
            <option value="+41" data-length="9" data-placeholder="76 123 45 67">İsviçre (+41)</option>
        </select>

        <label>Telefon</label>
        <input
            type="text"
            id="phoneInput"
            class="form-control"
            placeholder="555 111 22 33"
            inputmode="numeric"
            autocomplete="tel"
            required
        >
        <div class="hint">Başına 0 koymadan yazınız.</div>

        <input type="hidden" name="phone" id="phoneFull">

        <div class="card-fields <?= $cardPayment <= 0 ? 'hidden' : '' ?>">
            <label>Kart Numarası</label>
            <input
                type="text"
                id="cardNumber"
                class="form-control"
                placeholder="0000 0000 0000 0000"
                maxlength="19"
                inputmode="numeric"
                autocomplete="cc-number"
                <?= $cardPayment > 0 ? 'required' : '' ?>
            >

            <label>Son Kullanma Tarihi</label>
            <input
                type="text"
                id="expiryDate"
                class="form-control"
                placeholder="AA/YY"
                maxlength="5"
                inputmode="numeric"
                autocomplete="cc-exp"
                <?= $cardPayment > 0 ? 'required' : '' ?>
            >

            <label>CVV</label>
            <input
                type="text"
                id="cvv"
                class="form-control"
                placeholder="123"
                maxlength="3"
                inputmode="numeric"
                autocomplete="cc-csc"
                <?= $cardPayment > 0 ? 'required' : '' ?>
            >
        </div>

        <button type="submit" class="btn-neon">
            Siparişi Onayla
        </button>
    </form>
</div>

<script>
    const countryCode = document.getElementById('countryCode');
    const phoneInput = document.getElementById('phoneInput');
    const phoneFull = document.getElementById('phoneFull');

    const cardNumber = document.getElementById('cardNumber');
    const expiryDate = document.getElementById('expiryDate');
    const cvv = document.getElementById('cvv');

    function selectedCountry() {
        return countryCode.options[countryCode.selectedIndex];
    }

    function formatTurkeyPhone(digits) {
        let formatted = '';

        if (digits.length > 0) formatted = digits.substring(0, 3);
        if (digits.length > 3) formatted += ' ' + digits.substring(3, 6);
        if (digits.length > 6) formatted += ' ' + digits.substring(6, 8);
        if (digits.length > 8) formatted += ' ' + digits.substring(8, 10);

        return formatted;
    }

    function formatGenericPhone(digits) {
        return digits.replace(/(.{3})/g, '$1 ').trim();
    }

    function updatePhonePlaceholder() {
        const selected = selectedCountry();
        phoneInput.placeholder = selected.dataset.placeholder || 'Telefon numarası';
        phoneInput.value = '';
        phoneFull.value = '';
    }

    function formatPhoneNumber() {
        const selected = selectedCountry();
        const code = countryCode.value;
        const maxLength = parseInt(selected.dataset.length);

        let digits = phoneInput.value.replace(/\D/g, '');

        while (digits.startsWith('0')) {
            digits = digits.substring(1);
        }

        digits = digits.substring(0, maxLength);

        let formatted = code === '+90' ? formatTurkeyPhone(digits) : formatGenericPhone(digits);

        phoneInput.value = formatted;
        phoneFull.value = formatted ? code + ' ' + formatted : '';
    }

    phoneInput.addEventListener('input', formatPhoneNumber);

    countryCode.addEventListener('change', function () {
        updatePhonePlaceholder();
    });

    if (cardNumber) {
        cardNumber.addEventListener('input', function () {
            let value = this.value.replace(/\D/g, '');
            value = value.substring(0, 16);
            this.value = value.replace(/(.{4})/g, '$1 ').trim();
        });
    }

    if (expiryDate) {
        expiryDate.addEventListener('input', function () {
            let value = this.value.replace(/\D/g, '');
            value = value.substring(0, 4);

            if (value.length >= 3) {
                value = value.substring(0, 2) + '/' + value.substring(2);
            }

            this.value = value;
        });
    }

    if (cvv) {
        cvv.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').substring(0, 3);
        });
    }

    document.querySelector('form').addEventListener('submit', function () {
        formatPhoneNumber();
    });

    updatePhonePlaceholder();
</script>

</body>
</html>