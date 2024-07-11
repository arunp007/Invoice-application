<script setup>
    import { onMounted, ref } from 'vue';
    import axios from 'axios';

    

    let invoices = ref(['']);

    onMounted(() => {
        getInvoices();
    });
   
    const getInvoices = async () => {
        try {
            let response = await axios.get("http://127.0.0.1:8000/api/get_all_invoice");
            console.log('response', response.data);
            invoices.value = response.data.invoices;
            
        } catch (error) {
            console.error("Error fetching invoices:", error);
        }
    };

    


    
</script>

<template>
    <div class="invoices">
        
        <div class="card__header">
            <div>
                <h2 class="invoice__title">Invoices</h2>
            </div>
            <div>
                <a class="btn btn-secondary">
                    New Invoice
                </a>
            </div>
        </div>

        <div class="table card__content">
            <div class="table--filter">
                <span class="table--filter--collapseBtn ">
                    <i class="fas fa-ellipsis-h"></i>
                </span>
                <div class="table--filter--listWrapper">
                    <ul class="table--filter--list">
                        <li>
                            <p class="table--filter--link table--filter--link--active">
                                All
                            </p>
                        </li>
                        <li>
                            <p class="table--filter--link ">
                                Paid
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table--search">
                <div class="table--search--wrapper">
                    <select class="table--search--select" name="" id="">
                        <option value="">Filter</option>
                    </select>
                </div>
                <div class="relative">
                    <i class="table--search--input--icon fas fa-search "></i>
                    <input class="table--search--input" type="text" placeholder="Search invoice">
                </div>
            </div>

            <div class="table--heading">
                <p>ID</p>
                <p>Date</p>
                <p>Number</p>
                <p>Customer</p>
                <p>Due Date</p>
                <p>Total</p>
            </div>


            <div class="table--items" v-for="items in invoices" :key="items.id">
                <a href="#" class="table--items--transactionId">#{{items.id}}</a>
                <p>{{items.date}}</p>
                <p># {{items.number}}</p>
                <p> {{items.customer_id}}</p>
                <p>{{items.due_date}}</p>
                <p> $ {{items.total}}</p>
            </div>

           
           
        </div>
        
    </div>

   
</template>