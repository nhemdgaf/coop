import Vue from 'vue'
import VueRouter from 'vue-router'
import dashBoard from './views/dashBoard'
import membersProfile from './views/membersProfile'
import capitalShare from './views/capitalShare'
import loanTransaction from './views/loanTransaction'
import cashBook from './views/cashBook'
import reportGenerations from './views/reportGenerations'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'dashBoard',
    component: dashBoard
  },
  {
    path:'/MembersProfile',
    name:'MembersProfile',
    component: membersProfile
  },
  {
    path:'/CapitalShare',
    name:'CapitalShare',
    component: capitalShare
  },
  {
    path:'/LoanTransaction',
    name:'LoanTransaction',
    component: loanTransaction
  },
  {
    path:'/CashBook',
    name:'CashBook',
    component: cashBook
  },
  {
    path:'/ReportGenerations',
    name:'ReportGenerations',
    component: reportGenerations
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
