<template>
<v-main class="bg">
    <v-container fluid>
        <v-card class="mt-5">
            <v-card-title>
                Capital Share
                <v-dialog
                    v-model="memberDialog"
                    scrollable
                    max-width="400px">
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn
                            outlined
                            rounded
                            color="indigo accent-4"
                            dark v-bind="attrs"
                            v-on="on"
                            elevation="4"
                            class="mx-3">
                            <v-icon>add</v-icon>
                            Capital
                        </v-btn>
                    </template>
                    <v-card
                        v-if="!selectedMember"
                    >
                        <v-card-title>Members
                            <v-spacer></v-spacer>
                            <v-text-field
                                v-model="search"
                                append-icon="mdi-magnify"
                                class="shrink"
                                small
                                label="Search"
                                single-line
                                hide-details>
                            </v-text-field>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text style="height: 300px;">
                            <v-list>
                                <v-list-item-group
                                    color="primary"
                                >
                                    <v-list-item
                                        v-for="(item, i) in capitalShares"
                                        :key="i"
                                        @click="showCapitalShareDialog(item.full_name)"
                                    >
                                        <v-list-item-content>
                                            <v-list-item-title v-text="item.full_name"></v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-list-item-group>
                            </v-list>
                        </v-card-text>
                        <v-divider></v-divider>
                        <v-card-actions>
                            <v-btn
                                color="blue darken-1"
                                text
                                @click="memberDialog = false">Close</v-btn>
                            <v-btn
                                color="blue darken-1"
                                text
                                @click="memberDialog = false">Enter</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
                <v-spacer></v-spacer>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search"
                    single-line
                    hide-details
                ></v-text-field>
            </v-card-title>
            <div v-if="loading">
                <strong>LOADING</strong>
            </div>
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-center lime lighten-5 " rowspan="2">Member</th>
                            <th class="text-center lime lighten-5" colspan="13">2022 Coop Capital</th>
                        </tr>
                        <tr>
                            <th>2021 Capital</th>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>May</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Aug</th>
                            <th>Sep</th>
                            <th>Oct</th>
                            <th>Nov</th>
                            <th>Dec</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="item in capitalShares"
                            :key="item.id"
                        >
                            <td>{{ item.full_name }}</td>
                            <td>{{ formatNumber(item.capital_2021) || 0 }}</td>
                            <td>{{ formatNumber(item.jan) || 0 }}</td>
                            <td>{{ formatNumber(item.feb) || 0 }}</td>
                            <td>{{ formatNumber(item.mar) || 0 }}</td>
                            <td>{{ formatNumber(item.apr) || 0 }}</td>
                            <td>{{ formatNumber(item.may) || 0 }}</td>
                            <td>{{ formatNumber(item.jun) || 0 }}</td>
                            <td>{{ formatNumber(item.jul) || 0 }}</td>
                            <td>{{ formatNumber(item.aug) || 0 }}</td>
                            <td>{{ formatNumber(item.sep) || 0 }}</td>
                            <td>{{ formatNumber(item.oct) || 0 }}</td>
                            <td>{{ formatNumber(item.nov) || 0 }}</td>
                            <td>{{ formatNumber(item.dec) || 0 }}</td>
                        </tr>
                    </tbody>
                </template>

            </v-simple-table>
        </v-card>

    <v-dialog
      v-model="addCapitalShareDialog"
      scrollable
      persistent
      max-width="400px"
    >
      <v-card>
        <v-card-title class="text-h5">
          New Capital Share
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text>
            <v-form
                ref="form"
                v-model="valid"
                lazy-validation
            >
                <v-text-field
                    v-model="selectedMember"
                    :rules="fullNameRules"
                    label="Full name"
                    required
                    read-only
                ></v-text-field>
                <v-select
                    v-model="selectedMonth"
                    :items="months"
                    item-text="month"
                    item-value="abbr"
                    label="Month"
                ></v-select>
                <v-text-field
                    v-model="contribution"
                    :rules="contributionRules"
                    label="Contribution"
                    required
                ></v-text-field>
            </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="red darken-1"
            text
            @click="addCapitalShareDialog = false, selectedMember = ''"
          >
            Cancel
          </v-btn>
          <v-btn
            color="green darken-1"
            text
            @click="addNewCapitalShare()"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    </v-container>
</v-main>
</template>

<script>
export default {
    name:"capitalShare",
    data(){
      return{
        capitalShares: [],
        'loading': false,
        memberDialog:false,
        addCapitalShareDialog: false,
        selectedMember: '',
        search: '',
        valid: true,
        full_name: '',
        fullNameRules: [
            v => !!v || 'Full name is required',
        ],
        selectedMonth: '',
        months: [
            { month: 'January', abbr: 'jan' },
            { month: 'February', abbr: 'feb' },
            { month: 'March', abbr: 'mar' },
            { month: 'April', abbr: 'apr' },
            { month: 'May', abbr: 'may' },
            { month: 'June', abbr: 'jun' },
            { month: 'July', abbr: 'jul' },
            { month: 'August', abbr: 'aug' },
            { month: 'September', abbr: 'sep' },
            { month: 'October', abbr: 'oct' },
            { month: 'November', abbr: 'nov' },
            { month: 'December', abbr: 'dec' },
        ],
        contribution: '',
        contributionRules: [
            v => !!v || 'Contribution is required',
        ],
      }
    },
    mounted() {
        this.getCapitalShares();
    },
    computed: {
      headers () {
        return [
          {
            text: 'Member',
            align: 'start',
            sortable: true,
            value: 'full_name',
          },
          { text: 'Month', value: 'month'},
          { text: 'Year', value: 'year'},
          { text: 'Contribution', value: 'contribution' }
        ]
      },
    },
    methods: {
        getCapitalShares(){
            this.loading = true;

            axios.get('/api/capital-share')
                .then(response => {
                    this.capitalShares = response.data.capitalShares;
                    console.log(this.capitalShares);
                })
                .catch(error => {
                    console.log(error);
                })
                .then(() => {
                    this.loading = false;
                })
        },
        showCapitalShareDialog(name){
            this.addCapitalShareDialog = true;
            this.selectedMember = name;
        },
        addNewCapitalShare(){
            let data = {
                'full_name': this.selectedMember,
                'month': this.selectedMonth,
                'contribution': this.contribution
            }

            axios.post('/api/capital-share/add', data, {})
            .then(()=>{
                this.getCapitalShares();
            })
            .catch(err => { console.log(err) })

            this.addCapitalShareDialog = false;
            this.selectedMember = '';
        },
        formatNumber(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }
    }
}
</script>

<style>
.bg{
  background-color: #E0E0E0;
}

.shrink {
  width:200px;
}
</style>
