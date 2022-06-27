<template>
    <div>
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
            <router-link :to="{ query: 'home'}">Home
            </router-link>
            <router-link :to="{ name: 'list'}">list
            </router-link>
            <router-link :to="{ name: 'list2'}">list2
            </router-link>
            <router-link :to="{ name: 'create'}">
                <el-button type="primary" icon="el-icon-edit" circle></el-button>
            </router-link>
        </el-menu>

    </div>
</template>

<script>
export default {
     data() {
      return {
        activeIndex: '1',
        activeIndex2: '1'
      };
    },
}
</script>

<style>

</style>
