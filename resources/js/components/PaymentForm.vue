<template>
    <div>
        <LanguageSwitcher />
        <form @submit.prevent="submitPayment">
            <div>
                <label>{{ $t('amount') }}:</label>
                <input type="text" v-model="amount">
            </div>
            <div>
                <label>{{ $t('currency') }}:</label>
                <select v-model="currency">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                </select>
            </div>
            <button type="submit">{{ $t('payButton') }}</button>
        </form>
    </div>
</template>
    
<script>
import LanguageSwitcher from './LanguageSwitcher.vue';

export default {
    data() {
        return {
            amount: 0,
            currency: 'USD'
        };
    },
    components: {
        LanguageSwitcher
    },
    methods: {
        submitPayment() {
            // Обработка отправки формы оплаты
            // Вызов метода для отправки данных на сервер или выполнения другой логики
        }
    }
};
</script>
  