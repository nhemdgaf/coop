<template>

      <v-navigation-drawer app color="white"  class="elevation-6">
          <div class="d-flex justify-center mb-4 mt-4">
            <v-avatar size="82" class="d-flex justify-center">
                <v-img src="img/lnu-empc.png"></v-img>
            </v-avatar>      
          </div>

          <h4 class="text-center mt-4 fw-bold">LNU</h4>
          <p class="text-center">Employees Multi-Purpose Cooperative</p>
     
        <v-list>
            
        </v-list>


        <v-list dense nav>
            <v-list-item-group mandatory  color="#304FFE">
                <v-list-item to="/">
                    <v-list-item-icon>
                        <v-icon>dashboard</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Dashboard</v-list-item-title>
                </v-list-item>

                 <v-list-item to="/MembersProfile">
                    <v-list-item-icon>
                        <v-icon>badge</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Members Profile</v-list-item-title>
                </v-list-item>

                 <v-list-item to="/CapitalShare">
                    <v-list-item-icon>
                        <v-icon>handshake</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Capital Share</v-list-item-title>
                </v-list-item>

                <v-list-item to="/LoanTransaction">
                    <v-list-item-icon>
                        <v-icon>paid</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Loan Transaction</v-list-item-title>
                </v-list-item>

                <v-list-item to="/CashBook">
                    <v-list-item-icon>
                        <v-icon>menu_book</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Cash Book</v-list-item-title>
                </v-list-item>           

                <v-list-item to="/ReportGenerations">
                    <v-list-item-icon>
                        <v-icon>summarize</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Report Generations</v-list-item-title>
                </v-list-item>         
            </v-list-item-group>
        </v-list>

        <template v-slot:append>
            <div class="pa-2">
                <v-btn block color="#304FFE" dark small>
                    Logout
                </v-btn>
            </div>
        </template>
      </v-navigation-drawer>
</template>
