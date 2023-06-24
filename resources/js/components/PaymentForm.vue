<template>
  <div class="payment-form">
    <div class="payment-form__header">
      <div class="payment-form__logo">
        <img :src="logoUrl" alt="Логотип" class="payment-form__logo-image" />
      </div>
      <div class="payment-form__language-switcher">
        <LanguageSwitcher />
      </div>
    </div>
    <div class="payment-form__amount">
      <div class="payment-form__amount-label">{{ $t('paymentForm.amountLabel') }}</div>
      <div class="payment-form__amount-value">{{ amount }}</div>
      <div class="payment-form__amount-currency">{{ currency }}</div>
      <div class="payment-form__amount-description">{{ description }}</div>
    </div>
    <div class="payment-form__email">
      <label for="email" class="payment-form__email-label">{{ $t('paymentForm.emailLabel') }}</label>
      <v-text-field
        id="email"
        v-model="email"
        placeholder="Введите вашу электронную почту"
        outlined
        hide-details
      ></v-text-field>
    </div>
    <div class="payment-form__checkbox">
      <v-checkbox
        v-model="agreed"
        :label="$t('paymentForm.checkboxLabel')"
        hide-details
      ></v-checkbox>
    </div>
    <div class="payment-form__links">
      <a href="#" class="payment-form__link">{{ $t('paymentForm.offerLink') }}</a>
      <a href="#" class="payment-form__link">{{ $t('paymentForm.tariffsLink') }}</a>
    </div>
    <v-btn
      class="payment-form__button"
      :disabled="!agreed || !email"
      @click="pay"
    >
      {{ $t('paymentForm.payButton') }}
    </v-btn>
    <div v-if="paymentSuccess" class="payment-form__alert payment-form__alert--success">
      {{ $t('paymentForm.successMessage') }}
    </div>
    <div v-if="paymentError" class="payment-form__alert payment-form__alert--error">
      {{ $t('paymentForm.errorMessage') }}
    </div>
  </div>
</template>

<script>
import LanguageSwitcher from './LanguageSwitcher.vue';

export default {
    name: "PaymentForm",
    components: {
      LanguageSwitcher
    },
    data() {
        return {
            logoUrl: import.meta.env.VITE_LOGO_URL,
            amount: 100,
            currency: "USD",
            description: "Описание платежа",
            email: "",
            agreed: false,
            paymentSuccess: false,
            paymentError: false,
            selectedLanguage: "en",
            languageOptions: [
                { text: "English", value: "en" },
                { text: "Русский", value: "ru" },
            ],
        };
    },
    methods: {
        pay() {
            // Ваша логика обработки платежа здесь
            // Можете добавить проверки и валидацию перед отправкой запроса
            // В данном примере просто симулируем успешный или неуспешный платеж
            if (this.email && this.agreed) {
                // Успешный платеж
                this.paymentSuccess = true;
                this.paymentError = false;
            }
            else {
                // Неуспешный платеж
                this.paymentSuccess = false;
                this.paymentError = true;
            }
        },
    },
    components: { LanguageSwitcher }
};
</script>

<style scoped>
.payment-form {
  max-width: 768px;
  margin: 0 auto;
  padding: 20px;
}

.payment-form__header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}

.payment-form__logo-image {
  width: 150px;
  height: auto;
}

.payment-form__language-switcher {
  /* Стили для выбора языка */
  width: 190px;
  height: auto;
}

.payment-form__amount {
  margin-bottom: 20px;
}

.payment-form__amount-label {
  font-weight: bold;
}

.payment-form__amount-value {
  font-size: 24px;
}

.payment-form__amount-currency {
  font-size: 14px;
}

.payment-form__amount-description {
  font-size: 14px;
}

.payment-form__email {
  margin-bottom: 20px;
}

.payment-form__email-label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.payment-form__email-input {
  width: 100%;
  padding: 8px;
  font-size: 14px;
}

.payment-form__checkbox {
  margin-bottom: 20px;
}

.payment-form__checkbox-label {
  display: block;
}

.payment-form__checkbox-input {
  margin-right: 5px;
}

.payment-form__links {
  margin-bottom: 20px;
}

.payment-form__link {
  margin-right: 10px;
  color: blue;
}

.payment-form__button {
  display: block;
  width: 100%;
  padding: 10px;
  font-weight: bold;
  text-align: center;
  background-color: #4caf50;
  color: white;
  border: none;
  cursor: pointer;
}

.payment-form__button:disabled {
  background-color: #e0e0e0;
  cursor: not-allowed;
}

.payment-form__alert {
  margin-top: 20px;
  padding: 10px;
  text-align: center;
}

.payment-form__alert--success {
  background-color: #4caf50;
  color: white;
}

.payment-form__alert--error {
  background-color: #f44336;
  color: white;
}
</style>
