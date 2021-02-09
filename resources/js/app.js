/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('product', require('./components/product.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        precio_anterior: 0,
        precio_actual: 0,
        descuento: 0,
        porcentaje_descuento: 0,
        descuento_mensaje: '0',

    },
    computed: {
        generardescuento: function () {

            if (this.porcentaje_descuento > 100) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No puedes ingresar un valor mayor a 100',    
                });
                
                this.porcentaje_descuento = 100;
                this.descuento = (this.precio_anterior * this.porcentaje_descuento) / 100;
                this.precio_actual = this.precio_anterior - this.descuento;
                this.descuento_mensaje = "Este producto tiene el 100% de descuento, por ende este producto es gratis.";
                return this.descuento_mensaje;

            } else
                if (this.porcentaje_descuento < 0) {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No puedes ingresar un valor menor que 0',    
                });
                    
                    this.porcentaje_descuento = 0;
                    this.descuento = (this.precio_anterior * this.porcentaje_descuento) / 100;
                    this.precio_actual = this.precio_anterior - this.descuento;
                    this.descuento_mensaje = "";
                    return this.descuento_mensaje;

                } else

                    if (this.porcentaje_descuento > 0) {
                        this.descuento = (this.precio_anterior * this.porcentaje_descuento) / 100;
                        this.precio_actual = this.precio_anterior - this.descuento;


                        if (this.porcentaje_descuento == 100) {
                            this.descuento_mensaje = "Este producto tiene el 100% de descuento, por ende este producto es gratis.";

                        } else {
                            this.descuento_mensaje = 'Descuento de $MX:' + this.descuento;
                        }
                        return this.descuento_mensaje;
                    } else {
                        this.descuento = "";
                        this.precio_actual = this.precio_anterior;
                        this.descuento_mensaje = " ";
                        return this.descuento_mensaje;
                    }


        }
    },

});
