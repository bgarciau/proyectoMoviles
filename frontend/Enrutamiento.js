import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';

import Home from './Home';
import Login from './Login';
import Logout from './Logout';
import Orden from './Orden';
import VerOrden from './VerOrden';
import Registro from './Registro';

const Stack = createStackNavigator();
const Enrutamiento = () => {
    return (
        <NavigationContainer>
            <Stack.Navigator initialRouteName="Login">
                <Stack.Screen name="Home" component={Home} options={{ headerShown: false }}  />
                <Stack.Screen name="Login" component={Login} options={{ headerShown: false }}  />
                <Stack.Screen name="Logout" component={Logout} options={{ headerShown: false }}  />
                <Stack.Screen name="Orden" component={Orden} options={{ headerShown: false }}  />
                <Stack.Screen name="VerOrden" component={VerOrden} options={{ headerShown: false }}  />
                <Stack.Screen name="Registro" component={Registro} options={{ headerShown: false }}  />
            </Stack.Navigator>
        </NavigationContainer>
    )
};
export default Enrutamiento;