import React, { useEffect, useState } from 'react';
import { StyleSheet, View, TouchableHighlight, Text } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';

const Menu = ({ navigation }) => {
    
    const handleLogout = () => {
        navigation.navigate('Logout');
    };

    const handleHome = () => {
        navigation.navigate('Home');
    };

    const handleOrden = () => {
        navigation.navigate('Orden');
    };

    const handleVerOrden = () => {
        navigation.navigate('VerOrden');
    };

    const [hasToken, setHasToken] = useState(false);

    useEffect(() => {
        const checkToken = async () => {
            const userToken = await AsyncStorage.getItem('token');
            setHasToken(!!userToken);
        };

        checkToken();
    });

    if (hasToken) {
        return (
            <View style={styles.menuContainer}>
                <TouchableButton title="Home" onPress={handleHome} style={styles.smallButton} />
                <TouchableButton title="Realizar Orden" onPress={handleOrden} style={styles.smallButton} />
                <TouchableButton title="Mis ordenes" onPress={handleVerOrden} style={styles.smallButton} />
                <TouchableButton2 title="Cerrar Sesión" onPress={handleLogout} style={styles.smallButton2} />
            </View>
        );
    } else {
        return null;
    }
};

const TouchableButton = ({ title, onPress, style }) => (
    <TouchableHighlight
        style={[styles.button, style]}
        onPress={onPress}
        underlayColor="#FB7422"
    >
        <Text style={styles.buttonText}>{title}</Text>
    </TouchableHighlight>
);

const TouchableButton2 = ({ title, onPress, style }) => (
    <TouchableHighlight
        style={[styles.button, style]}
        onPress={onPress}
        underlayColor="#FFFFFF"
    >
        <Text style={styles.buttonText2}>{title}</Text>
    </TouchableHighlight>
);

const styles = StyleSheet.create({
    menuContainer: {
        flexDirection: 'row',
        position: 'absolute',  
        top: 0,  
        left: 0, 
        marginTop: 100,
    },
    button: {
        padding: 4,
        margin: 2,
        borderRadius: 1,
    },
    smallButton: {
        width: 99,
        backgroundColor: '#F7E9AB',
    },
    smallButton2: {
        width: 99,
        backgroundColor: '#FF0000',
    },
    buttonText: {
        color: 'black',
        textAlign: 'center',
    },
    buttonText2: {
        color: 'white',
        textAlign: 'center',
    },
});

export default Menu;