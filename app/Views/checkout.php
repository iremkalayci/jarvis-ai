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

<div class="box">
    <h1>Ödeme ve Sipariş Bilgileri</h1>

    <form action="<?= base_url('siparis-olustur') ?>" method="post">

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
            <option value="+7" data-length="10" data-placeholder="912 345 67 89">Rusya (+7)</option>
            <option value="+380" data-length="9" data-placeholder="67 123 45 67">Ukrayna (+380)</option>
            <option value="+994" data-length="9" data-placeholder="50 123 45 67">Azerbaycan (+994)</option>
            <option value="+995" data-length="9" data-placeholder="555 12 34 56">Gürcistan (+995)</option>
            <option value="+30" data-length="10" data-placeholder="691 234 5678">Yunanistan (+30)</option>
            <option value="+359" data-length="9" data-placeholder="88 123 4567">Bulgaristan (+359)</option>
            <option value="+40" data-length="9" data-placeholder="712 345 678">Romanya (+40)</option>
            <option value="+966" data-length="9" data-placeholder="50 123 4567">Suudi Arabistan (+966)</option>
            <option value="+971" data-length="9" data-placeholder="50 123 4567">Birleşik Arap Emirlikleri (+971)</option>
            <option value="+20" data-length="10" data-placeholder="100 123 4567">Mısır (+20)</option>
            <option value="+212" data-length="9" data-placeholder="600 123456">Fas (+212)</option>
            <option value="+91" data-length="10" data-placeholder="98765 43210">Hindistan (+91)</option>
            <option value="+86" data-length="11" data-placeholder="138 0013 8000">Çin (+86)</option>
            <option value="+81" data-length="10" data-placeholder="90 1234 5678">Japonya (+81)</option>
            <option value="+82" data-length="10" data-placeholder="10 1234 5678">Güney Kore (+82)</option>
            <option value="+61" data-length="9" data-placeholder="412 345 678">Avustralya (+61)</option>
            <option value="+55" data-length="11" data-placeholder="11 91234 5678">Brezilya (+55)</option>
            <option value="+52" data-length="10" data-placeholder="55 1234 5678">Meksika (+52)</option>
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

        <label>Kart Numarası</label>
        <input
            type="text"
            id="cardNumber"
            class="form-control"
            placeholder="0000 0000 0000 0000"
            maxlength="19"
            inputmode="numeric"
            autocomplete="cc-number"
            required
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
            required
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
            required
        >

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

        if (digits.length > 0) {
            formatted = digits.substring(0, 3);
        }

        if (digits.length > 3) {
            formatted += ' ' + digits.substring(3, 6);
        }

        if (digits.length > 6) {
            formatted += ' ' + digits.substring(6, 8);
        }

        if (digits.length > 8) {
            formatted += ' ' + digits.substring(8, 10);
        }

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

        let formatted = '';

        if (code === '+90') {
            formatted = formatTurkeyPhone(digits);
        } else {
            formatted = formatGenericPhone(digits);
        }

        phoneInput.value = formatted;
        phoneFull.value = formatted ? code + ' ' + formatted : '';
    }

    phoneInput.addEventListener('input', formatPhoneNumber);

    countryCode.addEventListener('change', function () {
        updatePhonePlaceholder();
    });

    cardNumber.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, '');
        value = value.substring(0, 16);
        this.value = value.replace(/(.{4})/g, '$1 ').trim();
    });

    expiryDate.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, '');
        value = value.substring(0, 4);

        if (value.length >= 3) {
            value = value.substring(0, 2) + '/' + value.substring(2);
        }

        this.value = value;
    });

    cvv.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').substring(0, 3);
    });

    document.querySelector('form').addEventListener('submit', function () {
        formatPhoneNumber();
    });

    updatePhonePlaceholder();
</script>

</body>
</html>