<template>
    <div>
        <header>
            <Sidebar/>
        </header>
        <main v-loading="loading" element-loading-text="데이터를 불러오고 있습니다..."
            >
            <router-view />
        </main>
    </div>
</template>

<script>
import Sidebar from './components/Sidebar.vue'
export default {
  components: { Sidebar },
  data: () => ({
      loading: true
  }),
  beforeMount () {
      this.loading = true;
  }

}
</script>

<style>

</style>
