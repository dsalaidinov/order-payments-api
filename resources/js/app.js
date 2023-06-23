// app.js

import { createApp } from 'vue';
import { createI18n } from 'vue-i18n';

import messages from './locales/en';
import PaymentForm from './components/PaymentForm.vue';

const i18n = createI18n({
    locale: document.documentElement.lang, // Установите начальный язык по умолчанию
    fallbackLocale: 'en', // Язык, используемый при отсутствии перевода для выбранного ключа
    messages,
  });

createApp(PaymentForm).use(i18n).mount('#app');



