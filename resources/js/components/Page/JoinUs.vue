<template>
    <div>
        <div   v-if="errors.length > 0 && !message" class="alert alert-warning text-center">
            <strong>Sorry!</strong> You should check in on some of those fields below.
            <br>
            <ul style="list-style:none">
                <li v-for="item in errors" :key="item.id">
                    {{ item }}
                </li>
            </ul>
        </div>
        <div   v-if=" message.length >0 " class="alert alert-info text-center">
            <h1> {{message}}</h1>
        </div>
        <v-form @submit.prevent="send" v-if="$i18n.locale == 'en'">
            <v-container>
            <v-row>
                <v-col
                cols="12"
                md="12"
                >
                <v-text-field
                    v-model="form.name"
                    label="Your Name"
                    required
                    loading
                    clearable
                ></v-text-field>
                </v-col>

                <v-col
                cols="12"
                md="12"
                >
                <v-text-field
                    v-model="form.email"
                    label="E-mail"
                    required
                    loading
                    clearable
                ></v-text-field>
                </v-col>
                <v-col
                cols="12"
                md="12"
                >
                <v-text-field
                    v-model="form.phone"
                    label="Your Phone Number"
                    required
                    loading
                    clearable
                ></v-text-field>
                </v-col>
                <v-col
                cols="12"
                md="12"
                >
                <v-text-field
                    v-model="form.socialLink"
                    label="Your Social Link"
                    required
                    loading
                    clearable
                ></v-text-field>
                </v-col>
            </v-row>
                <v-btn color="#f2efeb" type="submit">Join Us</v-btn>
            </v-container>
        </v-form>
        <v-form @submit.prevent="send" v-else>
            <v-container>
            <v-row>
                <v-col
                cols="12"
                md="12"
                >
                <v-text-field
                    v-model="form.name"

                    label="أسمك"
                    required
                    loading
                    clearable
                    dir="rtl"
                ></v-text-field>
                </v-col>

                <v-col
                cols="12"
                md="12"
                >
                <v-text-field
                    v-model="form.email"
                    label="بريدك اﻷلكتروني"
                    loading
                    clearable
                    required
                    dir="rtl"
                ></v-text-field>
                </v-col>
                <v-col
                cols="12"
                md="12"
                >
                <v-text-field
                    v-model="form.phone"
                    label="رقم الموبايل الخاص بك"
                    required
                    loading
                    clearable
                    dir="rtl"
                ></v-text-field>
                </v-col>
                <v-col
                cols="12"
                md="12"
                >
                <v-text-field
                    v-model="form.socialLink"
                    label="رابط التواصل الاجتماعي"
                    required
                    loading
                    clearable
                    dir="rtl"
                ></v-text-field>
                </v-col>
            </v-row>
                <v-btn color="#f2efeb" style="float:right" type="submit">أشترك معنا</v-btn>
                <div style="clear:both"></div>
            </v-container>
        </v-form>

    </div>

</template>

<script>
export default {
    data:()=>({
        form:{phone:'',name:'',email:'',socialLink:''},
        errors:[],
        message:'',
        loading: false,
    }),
    methods:{
        send(){
    axios.post('/api/artist-request',this.form)
    .then(res =>{

        if (!res.data.status)
        {
            this.errors = res.data.errors;


        }else{
            this.message = 'Successful';
            this.form.phone="";
            this.form.name="";
            this.form.email="";
            this.form.socialLink="";
            this.$router.push('/')


        }
    })
    .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>

<style scoped>
    .label{
        left: 90%;
    }

.v-btn:not(.v-btn--round).v-size--default{
    font-size: 16px !important;
    font-weight: bold !important;
    display: inline-block !important;
    padding: 20px 38px !important;
    cursor: pointer !important;
    transition: all .4s ease-out !important;
    letter-spacing: 1px !important;
    text-transform: uppercase !important;
    color: #fff !important;
    border: none !important;
    background-color: #000 !important;
    height:  auto!important;
    border-radius: 0!important;
}
</style>
