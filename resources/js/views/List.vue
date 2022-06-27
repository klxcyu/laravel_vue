<template>
    <el-row>
        <el-col :span="8" v-for="(o, index) in 2" :key="o" :offset="index > 0 ? 2 : 0">
            <el-card :body-style="{ padding: '0px' }">
            <img src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png" class="image">
            <div style="padding: 14px;">
                <span>Yummy hamburger{{ test }}</span>
                <div class="bottom clearfix">
                <time class="time">{{ currentDate }}</time>
                <el-button type="text" class="button">Operating</el-button>
                </div>
            </div>
            </el-card>
        </el-col>
    </el-row>
</template>

<script>
import axios from "axios"

export default {
    data() {
        return {
        currentDate: new Date(),
        test: null,
        };
    },
    beforeCreate() {
        this.$parent.loading = true;
    },
    created() {
        const requests = {
            names : '김지환'
        }

        console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        const headers = {
            'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }

        axios
        .post("http://127.0.0.1:8000/test", requests, { headers : headers })
        .then(( res ) => {
            console.log(`res ${res}`);
        })
        .catch(err => {
            let msg = err.response.data.errors;
            msg = msg.name[0];
          /*   this.open(msg); */
        })
        .finally(() => {
            this.$parent.loading = false;
        })
    },
    updated() {
        this.$parent.loading = false;
    },
    methods : {
        open(msg) {
            this.$message.error(msg);
        },
    }

}
</script>

<style>
  .time {
    font-size: 13px;
    color: #999;
  }

  .bottom {
    margin-top: 13px;
    line-height: 12px;
  }

  .button {
    padding: 0;
    float: right;
  }

  .image {
    width: 100%;
    display: block;
  }

  .clearfix:before,
  .clearfix:after {
      display: table;
      content: "";
  }

  .clearfix:after {
      clear: both
  }
</style>
