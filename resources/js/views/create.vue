<template>
    <div>
        <el-form :model="ruleForm" :rules="rules" ref="ruleForm" >
            <el-form-item label="Activity name" prop="title">
                <el-input placeholder="Please input" v-model="ruleForm.title"></el-input>
            </el-form-item>
            <el-form-item label="Activity content" prop="content">
                <el-input
                    type="textarea"
                    :autosize="{ minRows: 2, maxRows: 4}"
                    placeholder="Please input"
                    v-model="ruleForm.content">
                </el-input>
            </el-form-item>
            <el-button @click="submitForm()" type="success">Success</el-button>
        </el-form>
    </div>
</template>

<script>
import axios from "axios"

export default {
    data() {
        return {
            ruleForm: {
                title: '',
                content: '',
            },
            rules: {
                title : [
                    { required: true, message: '타이틀은 필수항목 입니다!', trigger: 'blur'}
                ],
                content : [
                    { required: true, message: '내용은 필수항목 입니다!', trigger: 'blur'}
                ],
            }
        }
    },
    beforeCreate() {
        this.$parent.loading = true;
    },
    created() {
        this.$parent.loading = false;
    },
    methods : {
        submitForm() {
            this.$refs['ruleForm'].validate((valid) => {
                if (valid) {
                    this.$parent.loading = true;

                    const headers = {
                        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }

                    axios
                    .post('/create', {
                        title: this.ruleForm.title,
                        content: this.ruleForm.content
                    })
                    .then(res => {
                        if(res.status === 200 || res.data === 'success') {
                            this.messages('등록이 완료되었습니다!', 'success');
                            this.$router.push('/list');
                            /* this.$parent.loading = false; */
                        }
                    })
                    .catch(err => {
                        const errors = err.response.data.errors;
                        for(const msg of Object.values(errors)) {
                            if(msg != undefined) {
                                msg.forEach(m => {
                                    setTimeout(() => {
                                        this.messages(m, 'error');
                                    }, 500);
                                });
                            }
                        }

                        this.$parent.loading = false;
                    })
                } else {
                    return false;
                }
            });
        },
        messages(msg, type) {
            this.$message({
                message: msg,
                type: type
            });
        },
    }
}
</script>
